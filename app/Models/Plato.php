<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Image;
use File;

class Plato extends Model
{
  public $timestamps = false;
  protected $fillable = ['nombre', 'precio', 'imagen'];

  //----------------------------------RELACIONES-------------------------------
  public function menus(){
    return $this->belongsToMany('App\Models\Menu', 'plato_menu');
  }

  //------------------------------------METODOS--------------------------------
  /**
   * Guarda plato
   *
   * @param  \Illuminate\Http\Request  $request
   * @return 
   */
  public static function guardar($request){
    $file = $request->file('imagen');

    $image = Image::make($file);
    $image->resize(500, null, function ($c){
      $c->aspectRatio();
      $c->upsize();
    });

    $plato = new Plato($request->all());
    $plato->imagen = (String) $image->encode('data-url');
    $plato->save();
    $plato->menus()->attach($request->menu_id);
  }
}
