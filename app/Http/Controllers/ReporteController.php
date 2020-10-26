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

class ReporteController extends Controller
{
    public function index(Request $request)
    {          
        return view('intranet.reporte.index');
    }


    function prueba(Request $request)
    {
      if(request()->ajax())
      {
          if(!empty($request->from_date))
          {
            $data = Ingreso::from('dbo_ingreso as i')
                                ->select('s.denominacion',  't.nombre AS servicio' , 'st.nombre AS analisis', DB::raw('COUNT( st.nombre ) AS cantidad' )  , 'ca.caracteristica', DB::raw( 'SUM(i.monto) as monto' ) , DB::raw( 'COUNT( st.nombre ) * SUM(i.monto) as total' ))
                                ->join('dbo_catalogo as ca', 'ca.id_catalogo', '=', 'i.id_catalogo')
                                ->join('dbo_subtipo as st', 'st.id_subtipo', '=', 'ca.id_subtipo')
                                ->join('dbo_tipo as t', 't.id_tipo', '=', 'st.id_tipo')
                                ->join('sede as s', 's.idsede', '=', 'i.id_sede')
                                ->whereBetween('i.fecha', array($request->from_date, $request->to_date))
                                ->groupBy('s.denominacion', 't.nombre', 'st.nombre', 'ca.caracteristica')
                                ->get();
                        //dd($data);
          }
          else
          {
            $data = Ingreso::from('dbo_ingreso as i')
                                ->select('s.denominacion',  't.nombre AS servicio' , 'st.nombre AS analisis', DB::raw('COUNT( st.nombre ) AS cantidad' )  , 'ca.caracteristica', DB::raw( 'SUM(i.monto) as monto' ) , DB::raw( 'COUNT( st.nombre ) * SUM(i.monto) as total' ))
                                ->join('dbo_catalogo as ca', 'ca.id_catalogo', '=', 'i.id_catalogo')
                                ->join('dbo_subtipo as st', 'st.id_subtipo', '=', 'ca.id_subtipo')
                                ->join('dbo_tipo as t', 't.id_tipo', '=', 'st.id_tipo')
                                ->join('sede as s', 's.idsede', '=', 'i.id_sede')
                                ->groupBy('s.denominacion', 't.nombre', 'st.nombre', 'ca.caracteristica')
                                ->get();
                       
          }
         // dd($data);
         return Datatables::of($data)
         ->addIndexColumn()
         ->addColumn('action', function($row){

                $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-default btn-sm editEntrega" id="botonEdit">No hay datos Disponobles</a>';

                //$btn = $btn.' <a href="javascript:void(0)"  data-id="'.$row->id.'" data-original-title="Ver" class="ver btn btn-success btn-sm verDevolucion" id="botonView">Ver</a>';

               // $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteEntrega">Eliminar</a>';

                 return $btn;
         })
         ->rawColumns(['action'])
         ->make(true);
      }
      return view('intranet.reporte.prueba');
    }
}
