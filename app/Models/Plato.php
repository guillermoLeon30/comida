<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Image;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

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
    $path = $file->hashName('comida');
    $url = asset('/storage/'.$path);

    $image = Image::make($file);
    $image->resize(500, null, function ($c){
      $c->aspectRatio();
      $c->upsize();
    });
    
    Storage::disk('public')->put($path, (string) $image->encode());

    $plato = new Plato($request->all());
    $plato->nombre_imagen = $path;
    $plato->imagen_url = $url;
    $plato->save();
    $plato->menus()->attach($request->menu_id);
  }
}
