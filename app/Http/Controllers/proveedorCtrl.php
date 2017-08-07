<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests;
use sisVentas\Persona;
use sisVentas\Http\Requests\personaFormRequest;
use DB;

class proveedorCtrl extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {   //index -> primer metodo a llamar
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $personas=DB::table('persona')
            ->where('nombre','LIKE','%'.$query.'%')
            ->where ('tipo_persona','=','Proveedor')
            ->orwhere('num_documento','LIKE','%'.$query.'%')
            ->where('tipo_persona','=','Proveedor')
            ->orderBy('idpersona','desc')
            ->paginate(7);
            return view('compras.proveedor.index',["personas"=>$personas,"searchText"=>$query]);
        }
    }

    //create new catagoria -> page
    public function create(){
        return view("compras.proveedor.create");
    }

    //method -> POST
    public function store (personaFormRequest $request){
        $persona = new Persona;
        $persona->tipo_persona      = 'Proveedor';
        $persona->nombre            = $request->get('nombre');
        $persona->tipo_documento    = $request->get('tipo_documento');
        $persona->num_documento     = $request->get('num_documento');
        $persona->direccion         = $request->get('direccion');
        $persona->telefono          = $request->get('telefono');
        $persona->email             = $request->get('email');
    
        $persona->save();
        return Redirect::to('compras/proveedor');
    }
    
    public function show($id){
        return view("compras.proveedor.show",["persona"=>Persona::findOrFail($id)]);
    }

    public function edit($id){
        return view("compras.proveedor.edit",["persona"=>Persona::findOrFail($id)]);
    }

    //method -> PATCH
    public function update(personaFormRequest $request,$id){
        $persona=Persona::findOrFail($id);
        $persona->nombre            = $request->get('nombre');
        $persona->tipo_documento    = $request->get('tipo_documento');
        $persona->num_documento     = $request->get('num_documento');
        $persona->direccion         = $request->get('direccion');
        $persona->telefono          = $request->get('telefono');
        $persona->email             = $request->get('email');
        $persona->update();
        return Redirect::to('compras/proveedor');
    }

    public function destroy($id){
        $persona=Persona::findOrFail($id);
        $persona->tipo_persona='Inactivo';
        $persona->update();
        return Redirect::to('compras/proveedor');
    }
}
