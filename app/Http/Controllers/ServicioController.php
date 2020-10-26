<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Tipo;

use DataTables;
use Validator;
use Response;

use Carbon\Carbon;

class ServicioController extends Controller
{
    public function index(Request $request)
    {        
        $tipos = Tipo::get(); 
        if($request->ajax()){
            $data = Tipo::get();

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


        return view('intranet.catalogo.servicio.index', compact('tipos'));
    }

    public function create(Request $request)
    {    

        $tipos = Tipo::get(); 
        $subtipos = Subtipo::get();

        return view('intranet.catalogo.create', compact('tipos', 'subtipos'));
    }

    public function store(Request $request)
    {   

        Tipo::create($request->all());

        //dd($store);

        return redirect('intranet/catalogo/servicio')->with('success','Registro creado satisfactoriamente');

    }

}
