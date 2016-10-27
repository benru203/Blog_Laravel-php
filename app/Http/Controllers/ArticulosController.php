<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ArticulosRequest;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Categoria;
use App\Etiqueta;
use App\Articulo;
use App\Imagen;


class ArticulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articulos = Articulo::search($request->titulo)->orderBy('id','DESC')->paginate(5);
        $articulos->each(function($articulos){
            $articulos->categoria;
            $articulos->user;
        });
        return view('Admin.Articulos.index')->with('articulos',$articulos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::orderBy('name','ASC')->lists('name','id');
        $etiquetas = Etiqueta::orderBy('nombre','ASC')->lists('nombre','id');
        return view('Admin.Articulos.create')->with('categorias',$categorias)->with('etiquetas',$etiquetas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticulosRequest $request)
    {
        //manipulacion de archivos
        if($request->file('imagen')){
            $file = $request->file('imagen');
            $name = 'RedArticulo_'. time() . '.'.$file->getClientOriginalExtension();
            $path = public_path().'/Imagenes/Articulos/';
            $file->move($path,$name); 
        }
        $articulo = new Articulo();
        $articulo->titulo =$request->titulo;
        $articulo->contenido = $request->contenido;
        $articulo->categoria_id = $request->categoria_id;
        $articulo->user_id = \Auth::user()->id;
        $articulo->save();
       
        //esta linea lo que hace es guardar las etiquetas que se le agregan al articulo
        $articulo->etiquetas()->sync($request->etiquetas);

        //con estas lineas se guarda las imagenes
        $imagen = new Imagen();
        $imagen->nombre = $name;
        $imagen->articulo()->associate($articulo);
        $imagen->save();

        flash('El Articulo ' . $articulo->titulo . ' ha sido Registrado Correctamente','success'); 
        return redirect()->route('Admin.Articulos.index');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articulo = Articulo::find($id);
        $articulo->categoria;
        $categorias = Categoria::orderBy('name','DESC')->lists('name','id');
        $etiquetas = Etiqueta::orderBy('nombre','DESC')->lists('nombre','id');

        $mis_etiquetas = $articulo->etiquetas->lists('id')->toArray();
        return view('Admin.Articulos.edit')->with('categorias',$categorias)->with('articulo',$articulo)->with('etiquetas',$etiquetas)->with('mis_etiquetas',$mis_etiquetas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $articulo = Articulo::find($id);
        $articulo->titulo = $request->titulo;
        $articulo->contenido = $request->contenido;
        $articulo->categoria_id = $request->categoria_id;
        $articulo->save();
        $articulo->etiquetas()->sync($request->etiquetas);
        flash('El Articulo ' . $request->titulo . ' ha sido editado exitosamente!','warning');
        return redirect()->route('Admin.Articulos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = Articulo::find($id);
        $articulo->delete();
        flash('El Articulo ' . $articulo->titulo . ' ha sido borrado exitosamente!','danger');
        return redirect()->route('Admin.Articulos.index');
    }
}
