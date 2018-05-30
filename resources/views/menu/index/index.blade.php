@extends('plantilla.principal')

@section('encabezadoContenido')
  <section class="content-header">
    <div class="box-header">
      <h2 class="box-title" style="font-size: 30px">Menus</h2>

      <div class="box-tools">
        <button class="btn btn-success pull-right" data-toggle="modal" data-target="#modalIngresarMenu">
          <i class="glyphicon glyphicon-plus"></i>
          Nuevo
        </button>
      </div>
    </div>
  </section>
@endsection

@section('contenido')
  <div class="row">
    <div class="col-xs-12 col-sm-9" id="mensaje"></div>

    <div class="col-xs-12 col-md-9">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title"></h3>

          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 200px;">
              <input type="text" id="buscar" class="form-control pull-right" placeholder="Buscar">

              <div class="input-group-addon">
                <i class="fa fa-search"></i>
              </div>
            </div>
          </div>
        </div>
        
        <div id="tablaMenus">
          @include('menu.index.include.tablaMenus')
        </div>
      </div>
    </div>
  </div>

  @include('menu.index.include.modalIngresarMenu')
@endsection

@push('js')
  @include('librerias.js.mensajes')
  @include('menu.index.js.js')
  @include('menu.index.js.jsGuardarMenu')
  @include('menu.index.js.jsActivarDesactivar')
@endpush