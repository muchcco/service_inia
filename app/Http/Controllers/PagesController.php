<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Sede;
use App\Tipo;
use App\Subtipo;
use App\Almacen;
use App\Ingreso;

use DataTables;
use Validator;
use Response;


use App\Http\Controllers\Controller;
use Carbon\Carbon;
class PagesController extends Controller
{
    public function index()
    {
        $sedes = Sede::get();
      
        for ($i=0; $i <  count($sedes) ; $i++) { 
            
            
            $cantidad_registros = Almacen::from('dbo_almacen as al')
                                            ->join('dbo_catalogo as ca', 'ca.id_catalogo', '=', 'al.id_catalogo')
                                            ->join('dbo_subtipo as sbt', 'sbt.id_subtipo', '=', 'ca.id_subtipo')                          
                                            ->join('dbo_tipo as ti', 'ti.id_tipo', '=', 'sbt.id_tipo')
                                            ->join('sede as u', 'u.idsede', '=', 'al.id_sede')
                                            ->where('al.id_sede',   $sedes[$i]["idsede"])
                                            ->count();

            $sedes[$i]["cantidad_registros"] = $cantidad_registros;
                                          //  dd($cantidad_registros);

        }

        return view('welcome', compact('sedes'));
    }

    public function tabla(Request $request)
    {       
        $idsede = $request->idsede;
        return view('estacion.tabla', compact('idsede'));
        
    }

    public function prueba(Request $request)
    {
        $data = Almacen::from('dbo_almacen as al')
                    ->select( 'ti.nombre as servicio', 'sbt.nombre as analisis', 'ca.caracteristica', 'al.costo_analisis', 'al.forma_pago', 'al.plazo_entrega', 'al.stock' )
                    ->join('dbo_catalogo as ca', 'ca.id_catalogo', '=', 'al.id_catalogo')
                    ->join('dbo_subtipo as sbt', 'sbt.id_subtipo', '=', 'ca.id_subtipo')                          
                    ->join('dbo_tipo as ti', 'ti.id_tipo', '=', 'sbt.id_tipo')
                    ->join('sede as u', 'u.idsede', '=', 'al.id_sede')
                    ->where('al.id_sede',  $request->idsede)
                    ->get();
        //dd($data);

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

    public function estacion(Request $request)
    {
        //dd($request->idsede);
        $data = Almacen::from('dbo_almacen as al')
                    ->select( 'ti.nombre as servicio', 'sbt.nombre as analisis', 'ca.caracteristica', 'al.costo_analisis', 'al.forma_pago', 'al.plazo_entrega', 'al.stock' )
                    ->join('dbo_catalogo as ca', 'ca.id_catalogo', '=', 'al.id_catalogo')
                    ->join('dbo_subtipo as sbt', 'sbt.id_subtipo', '=', 'ca.id_subtipo')                          
                    ->join('dbo_tipo as ti', 'ti.id_tipo', '=', 'sbt.id_tipo')
                    ->join('sede as u', 'u.idsede', '=', 'al.id_sede')
                    ->where('al.id_sede',  $request->idsede)
                    ->get();
                    dd($request->ajax());    
        if($request->ajax())
        {                             
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

        return view('estacion.index');
    }
}
