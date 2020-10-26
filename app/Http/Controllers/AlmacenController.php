<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Almacen;
use App\Subtipo;
use App\Tipo;
use App\Catalogo;
use App\Sede;

use DataTables;
use Validator;
use Response;

use Carbon\Carbon;

class AlmacenController extends Controller
{
    public function index(Request $request)
    {
        
       
        if($request->ajax()){
            $data = Almacen::from('dbo_almacen as al')
                            ->select( 'ti.nombre as servicio', 'sbt.nombre as analisis', 'ca.caracteristica', 'al.costo_analisis', 'al.forma_pago', 'al.plazo_entrega', 'al.stock', 'al.created_at' )
                            ->join('dbo_catalogo as ca', 'ca.id_catalogo', '=', 'al.id_catalogo')
                            ->join('dbo_subtipo as sbt', 'sbt.id_subtipo', '=', 'ca.id_subtipo')                          
                            ->join('dbo_tipo as ti', 'ti.id_tipo', '=', 'sbt.id_tipo')
                            ->join('sede as u', 'u.idsede', '=', 'al.id_sede')
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


        return view('intranet.almacen.index', compact('tipos'));
    }

    public function create(Request $request)
    {
        

       $tipos = Tipo::get();
        
        return view('intranet.almacen.create', compact('datas', 'tipos'));
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
        Almacen::create($request->all());

        return back()->with('success', 'todo ok..');
    }
}
