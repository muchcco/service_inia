<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\Sede;

use DataTables;
use Validator;
use Response;

use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
class UsuariosController extends Controller
{

    function __construct()
    {
        $this->middleware('roles:admin');
    }


    public function index()
    {
        return view('intranet.usuarios.index');
    }

    public function listar(Request $request)
    {
       
            $data = User::from('users as u')
                        ->join('roles as rl', 'rl.id', '=', 'u.role_id')
                        ->join('sede as s', 's.idsede', '=', 'u.id_sede')
                        ->select( DB::raw( 'CONCAT( u.name, " ", u.last_name ) as nombres'), 'u.email', 's.denominacion', 'rl.descripcion as nombre_sede', 'u.flag' )
                        //->orderBy('')
                        ->get();
          
          //dd($data);
         return Datatables::of($data)
         ->addIndexColumn()
         ->addColumn('action', function($row){

                $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-default btn-sm editEntrega" id="botonEdit">No hay datos Disponobles</a>';

                //$btn = $btn.' <a href="javascript:void(0)"  data-id="'.$row->id.'" data-original-title="Ver" class="ver btn btn-success btn-sm verDevolucion" id="botonView">Ver</a>';

               // $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteEntrega">Eliminar</a>';

                 return $btn;
         })
         ->rawColumns([  'action'])
         ->make(true);
       
     // return view('intranet.usuarios.listar');
    }


    public function prueba()
    {
        $usuarios = User::all();

        return view('intranet.usuarios.prueba', compact('usuarios'));
    }

    public function create(Request $request)
    {         
        $roles = Role::get();
        $sedes = Sede::get();
        $view_create = view('intranet.usuarios.modal.create', compact(['roles', 'sedes']))->render();
        return response()->json(['html'=>$view_create]);
    }

    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(), [

            'name' => 'required|max:30|min:6|unique:users',

            'email' => 'required|email|max:50|unique:users',

            'password' => 'required|confirmed|min:6',

        ]);

       $input = $request->all();
       if(!empty($input['password']))
       {
           $input['password'] = Hash::make($input['password']);
       }

       $response_data = User::create($input);
       //dd($response_data);
       return Response::json( $response_data );
    }


}
