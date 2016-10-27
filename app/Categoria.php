<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
	protected $table = "categorias";
	protected $fillabel = ['nombre'];

	//para crear una relacion se coloca una funcion publica con el nombre de la tabla donde esta la relacion
	// en plurar ejemplo articulos() sin parametros y lo de plural es por el tipo de relacion one - many aca es uno a muchos por eso se coloca articulos en el modelo articulo la funcion es categoria()

	public function articulos(){
		return $this->hasMany('App\Articulo');
	}
}
