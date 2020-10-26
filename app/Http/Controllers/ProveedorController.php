<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Proveedor;
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
use nusoap_client;
use nusoap;
class ProveedorController extends Controller
{
    public function index()
    {
        return view('intranet.proveedor.index');
    }

    public function tabla(Request $request)
    {
        $data = Proveedor::get();

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

    public function buscar(Request $request)
    {
       // dd($request->dni);

        $datos = Proveedor::select('*')->where('DNI', $request->dni)->get();


        if(count($datos) == 0){
            $client = new nusoap_client(env('SOAP_RUTA'),'wsdl');
            $result = $client->call("consultar", array('arg0' => array( "nuDniConsulta" => $request->dni,
                                                    'nuDniUsuario'          => env('SOAP_DNI_USUARIO'),
                                                    'nuRucUsuario'          => env('SOAP_RUC_USUARIO'),
                                                    'password'              => env('SOAP_PASSWORD'))));
            $soap_res = $result['return']['datosPersona'];
            $datos = [];
            $datos[0]["Nombres"] = $soap_res['prenombres'];
            $datos[0]["ApePat"] = $soap_res['apPrimer'];
            $datos[0]["ApeMat"] = $soap_res['apSegundo'];
            $datos[0]["Nombres"] = $soap_res['prenombres'];
            $datos[0]["codigo"] = $result['return']['coResultado'];

            return ($datos);



        }
    }


    public function create(Request $request)
    {
        return view('intranet.proveedor.create');
    }

}
