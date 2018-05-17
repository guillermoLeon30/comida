@extends('plantilla.principal')

@section('encabezadoContenido')
  <section class="content-header">
    <div class="box-header">
      <h2 class="box-title" style="font-size: 30px">Platos</h2>
    </div>
  </section>
@endsection

@section('contenido')
  <div class="row">
    <div class="col-xs-12 col-sm-9" id="mensaje"></div>
    <div id="imagen-errors"></div>

    <div class="col-xs-12 col-md-9">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title"></h3>
          <button class="btn btn-success" data-toggle="modal" data-target="#modalIngresar">
            <i class="glyphicon glyphicon-plus"></i>
          </button>

          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 200px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="Buscar">

              <div class="input-group-addon"><i class="fa fa-search"></i></div>
            </div>
          </div>
        </div>
        
        <div id="tPlatos">
          @include('platos.index.include.tPlatos')
        </div>
        
      </div>
    </div>
  </div>

  @include('platos.index.include.modalIngresarPlato')
@endsection

@push('js')
  @include('librerias.js.mensajes')
  @include('platos.index.js.js')
  @include('platos.index.js.jsGuardarPlato')
@endpush