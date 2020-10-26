<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Tipo;
use App\Subtipo;

use DataTables;
use Validator;
use Response;

use Carbon\Carbon;

class AnalisisController extends Controller
{
    public function index(Request $request)
    {        
        $tipos = Tipo::get(); 
        if($request->ajax()){
            $data = Subtipo::from('dbo_subtipo as s')
                            ->select( 't.nombre as nombret', 's.nombre as nombres' )
                            ->rightJoin('dbo_tipo as t', 't.id_tipo', '=', 's.id_tipo')
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


        return view('intranet.catalogo.analisis.index', compact('tipos'));
    }

    public function create(Request $request)
    {    
        $tipos = Tipo::orderBy('nombre', 'asc')->get();
        $view_create = view('intranet.catalogo.analisis.modal.create', compact('tipos'))->render();
        return response()->json(['html'=>$view_create]);
    }

    public function store(Request $request)
    {   

       // return $request->all();
        $attr = $request->all();
       $response_data = Subtipo::create($attr);

       return Response::json( $response_data );

    }

}
