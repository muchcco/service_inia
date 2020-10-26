<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Catalogo;
use App\Subtipo;
use App\Tipo;

use DataTables;
use Validator;
use Response;

use Carbon\Carbon;

class CatalogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        if($request->ajax()){
            $data = Catalogo::from('dbo_catalogo as c')
                             ->select('c.codigo', 't.nombre as nombret', 's.nombre as nombrest', 'c.caracteristica', 'c.created_at')
                             ->join('dbo_subtipo as s', 's.id_subtipo', '=', 'c.id_subtipo')
                             ->join('dbo_tipo as t', 't.id_tipo', '=', 's.id_tipo')                             
                             //->where('articulo.id_user' , $request->id)
                             ->get();

           //dd($data);
            // agregar use DataTables; al controlador
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-success btn-sm editEntrega" id="botonEdit">Editar</a>';

                           //$btn = $btn.' <a href="javascript:void(0)"  data-id="'.$row->id.'" data-original-title="Ver" class="ver btn btn-success btn-sm verDevolucion" id="botonView">Ver</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteEntrega">Eliminar</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }


        return view('intranet.catalogo.index');
    }

    
    public function create(Request $request)
    {    

        $tipos = Tipo::get(); 
        $subtipos = Subtipo::get();

        return view('intranet.catalogo.create', compact('tipos', 'subtipos'));
    }

    public function subtipos(Request $request)
    {

        $html = Subtipo::where('id_tipo', $request->id)->get();
    
        return $html;
    }

    public function store(Request $request)
    {   
          
        Catalogo::create($request->all());

        //dd($store);

        return redirect('intranet/catalogo/create')->with('success','Registro creado satisfactoriamente');

    }


}
