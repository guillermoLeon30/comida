<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
  public $timestamps = false;
  protected $fillable = ['nombre'];

  //----------------------------------RELACIONES-------------------------------
  public function platos(){
    return $this->belongsToMany('App\Models\Plato', 'plato_menu');
  }

  //------------------------------------ALCANCES----------------------------------
  public function scopeBuscar($query, $buscar){
    return $query->where('nombre', 'like', '%'.$buscar.'%');
  }

  //------------------------------------METODOS--------------------------------
  /**
   * Buscar platos segun el nombre del plato.
   *
   * @param  string  $buscar
   * @return arr  $platos
   */

  public function buscarPlatos($buscar){
    return $this->platos()->where('nombre', 'like', '%'.$buscar.'%');
  }
}
