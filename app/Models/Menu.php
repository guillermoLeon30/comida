<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
	public $timestamps = false;
  protected $fillable = ['nombre'];

  //------------------------------------ALCANCES----------------------------------
  public function scopeBuscar($query, $buscar){
    return $query->where('nombre', 'like', '%'.$buscar.'%');
  }
}
