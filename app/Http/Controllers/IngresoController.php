<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Catalogo;
use App\Ingreso;
use App\Sede;
use App\Almacen;
use App\Detalleingreso;
use App\Subtipo;
use App\Tipo;

use DataTables;
use Validator;
use Response;

use Carbon\Carbon;


class IngresoController extends Controller
{
    public function index(Request $request)
    {
       
        if($request->ajax()){
            $data = Ingreso::from('dbo_ingreso as i')
                            ->select( 't.nombre as servicio', 'st.nombre as analisis', 'ca.caracteristica' ,'i.cantidad_muestra', 'i.monto', 'i.observacion', 'i.fecha' )
                            ->join('dbo_catalogo as ca', 'ca.id_catalogo', '=', 'i.id_catalogo')
                            ->join('dbo_subtipo as st', 'st.id_subtipo', '=', 'ca.id_subtipo')
                            ->join('dbo_tipo as t', 't.id_tipo', '=', 'st.id_tipo')
                            ->join('sede as u', 'u.idsede', '=', 'i.id_sede')
                            ->where('u.idsede', auth()->user()->id_sede)
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


        return view('intranet.ingreso.index');
    }

    public function create(Request $request)
    {  

        $tipos = Almacen::from('dbo_almacen as al')
                        ->select('t.nombre as nombre', 't.id_tipo')
                        ->join('dbo_catalogo as ca', 'ca.id_catalogo', '=', 'al.id_catalogo')
                        ->join('dbo_subtipo as st', 'st.id_subtipo', '=', 'ca.id_subtipo')
                        ->join('dbo_tipo as t', 't.id_tipo', '=', 'st.id_tipo')
                        ->where( 'al.id_sede', auth()->user()->id_sede )
                        ->groupBy('t.nombre', 't.id_tipo')
                        ->get();
                     //   dd($tipos);

        return view('intranet.ingreso.create', compact('tipos'));
    }

    public function subtipos(Request $request)
    {

        $html = Subtipo::where('id_tipo', $request->id)->get();
    
        return $html;
    }

    public function subtiposca(Request $request)
    {

        $html = Catalogo::where('id_subtipo', $request->id)->get();
    
        return $html;
    }

    public function store(Request $request)
    {
        //return $request->all();

        Ingreso::create($request->all());

        return back()->with('success', 'todo ok..');
    }
}
