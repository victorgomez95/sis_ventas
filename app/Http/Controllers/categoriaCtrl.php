<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests;
use sisVentas\Categoria;
use sisVentas\Http\Requests\categoriaFormRequest;
use DB;


class categoriaCtrl extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {   //index -> primer metodo a llamar
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $categorias=DB::table('categoria')->where('nombre','LIKE','%'.$query.'%')
            ->where ('condicion','=','1')
            ->orderBy('idcategoria','desc')
            ->paginate(7);
            return view('almacen.categoria.index',["categorias"=>$categorias,"searchText"=>$query]);
        }
    }

    //create new catagoria -> page
    public function create(){
        return view("almacen.categoria.create");
    }

    //method -> POST
    public function store (CategoriaFormRequest $request){
        $categoria = new Categoria;
        $categoria->nombre      = $request->get('nombre');
        $categoria->descripcion = $request->get('descripcion');
        $categoria->condicion   = '1';
        $categoria->save();
        return Redirect::to('almacen/categoria');
    }
    
    public function show($id){
        return view("almacen.categoria.show",["categoria"=>Categoria::findOrFail($id)]);
    }

    public function edit($id){
        return view("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);
    }

    //method -> PATCH
    public function update(CategoriaFormRequest $request,$id){
        $categoria=Categoria::findOrFail($id);
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->update();
        return Redirect::to('almacen/categoria');
    }

    public function destroy($id){
        $categoria=Categoria::findOrFail($id);
        $categoria->condicion='0';
        $categoria->update();
        return Redirect::to('almacen/categoria');
    }
}
