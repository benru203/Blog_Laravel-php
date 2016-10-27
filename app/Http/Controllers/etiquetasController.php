<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Etiqueta;
use Laracasts\Flash\Flash;
use App\Http\Requests\EtiquetasRequest;

class etiquetasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $etiquetas = Etiqueta::search($request->nombre)->orderBy('id','ASC')->paginate(5);
        return view('Admin.Etiquetas.index')->with('etiquetas',$etiquetas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Etiquetas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $etiqueta = new Etiqueta();
        $etiqueta->nombre = $request->nombre;
        $etiqueta->save();
        flash('La Etiqueta ' . $etiqueta->nombre . ' ha sido Registrada Correctamente!','success');
        return redirect()->route('Admin.Etiquetas.index');
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
        $etiqueta = Etiqueta::find($id);
        return view('Admin.Etiquetas.edit')->with('etiqueta',$etiqueta);
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
        $etiqueta = Etiqueta::find($id);
        $etiqueta->nombre = $request->nombre;
        $etiqueta->save();
        flash('La Etiqueta ' . $request->name . ' ha sido editada exitosamente!','warning');
        return redirect()->route('Admin.Etiquetas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $etiqueta = Etiqueta::find($id);
        $etiqueta->delete();
        flash('La Etiqueta ' . $categoria->name . ' ha sido borrada exitosamente!','danger');
        return redirect()->route('Admin.Categorias.index');
    }
}
