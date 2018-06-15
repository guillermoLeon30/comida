<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Image;
use Illuminate\Http\File;

class Plato extends Model
{
  public $timestamps = false;
  protected $fillable = ['nombre', 'precio', 'nombre_imagen', 'imagen_url'];

  //----------------------------------RELACIONES-------------------------------
  public function menus(){
    return $this->belongsToMany('App\Models\Menu', 'plato_menu');
  }

  //------------------------------------ALCANCES----------------------------------
  public function scopeBuscar($query, $buscar){
    return $query->where('nombre', 'like', '%'.$buscar.'%');
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
    $extension = $file->getClientOriginalExtension();
    $file_name = 'platos/'.time().'.'.$extension;
    $url = asset('/storage/'.$file_name);

    $image = Image::make($file);
    $image->resize(500, null, function ($c){
      $c->aspectRatio();
      $c->upsize();
    });
    
    $image->save(storage_path('app/public/').$file_name);

    $plato = new Plato($request->all());
    $plato->nombre_imagen = $file_name;
    $plato->imagen_url = $url;
    $plato->save();
    $plato->menus()->attach($request->menu_id);
  }
}
