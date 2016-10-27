<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    protected $table = "etiquetas";
    protected $fillabel = ['nombre'];

    public function articulos(){
    	return $this->belongsToMany('App\Articulo')->withTimestamps();
    }

    public function scopeSearch($query,$nombre)
    {
    	return $query->where('nombre','LIKE',"%$nombre%");
    }
}
