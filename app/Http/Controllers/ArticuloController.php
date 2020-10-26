<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Articulo;
use App\Subtipo;
use App\Tipo;
use App\Sede;
use App\Forma_Pago;

use DataTables;
use Validator;
use Response;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;


class ArticuloController extends Controller
{
    public function index(Request $request)
    {   
        if($request->ajax()){
            $data = Articulo::from('articulos as a')
                             ->select( 's.denominacion', 't.nombre as nom_t', 'st.nombre as nom_st', 'a.articulo', 'a.cantidad', 'a.costo', 'a.observacion', 'a.created_at', 'a.monto_total' )
                             ->join('subtipos as st', 'st.id', '=', 'a.id_subtipo')
                             ->join('tipos as t', 't.id', '=', 'st.id_tipo')
                             ->join('sedes as s', 's.idsede', '=', 'a.id_sede')
                             
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


        return view('intranet.articulo.index');
    }

    public function create(Request $request)
    {    

        $tipos = Tipo::get(); 
        
        $formas = Forma_Pago::get();

        return view('intranet.articulo.create', compact('tipos', 'formas'));
    }

    public function subtipos(Request $request)
    {
        if (!$request->id) {
            $html = '<option value=""> No a seleccionado un servicio </option>';
        } else {
            $html = '';
            $subtipos = Subtipo::where('id', $request->id)->get();
            foreach ($subtipos as $subtipo) {
                $html .= '<option value="'.$subtipo->id.'">'.$subtipo->nombre.'</option>';
            }
        }
    
        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {   
          
       Articulo::create($request->all());

       //dd($store);

        return redirect('intranet/articulo/create')->with('success','Registro creado satisfactoriamente');

    }



}
