<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Articulo extends Model
{
	use Sluggable;

    protected $table = "articulos";
	protected $fillabel = ['titulo','contenido','user_id','categoria_id'];

	public function categoria(){
		return $this->belongsTo('App\Categoria');
	}

	public function user(){
		return $this->belongsTo('App\user');
	}

	public function imagenes(){
		return $this->hasMany('App\imagen');
	}

	//para crear relaciones muchos a muchos.
	public function etiquetas(){
		return $this->belongsToMany('App\Etiqueta');
	}

	 public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'titulo'
            ]
        ];
    }

    public function scopeSearch($query,$titulo)
    {
    	return $query->where('titulo','LIKE',"%$titulo%");
    }
}
