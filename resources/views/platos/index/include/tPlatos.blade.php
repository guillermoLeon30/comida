<div class="box-body table-responsive no-padding">
  <table class="table table-hover">
    <thead>
      <tr>
        <th></th>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Activo</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($platos as $plato)
        <tr>
          <td>
            <button class="btn btn-warning">
              <i class="glyphicon glyphicon-arrow-up"></i>
            </button>
            <button class="btn btn-warning">
              <i class="glyphicon glyphicon-arrow-down"></i>
            </button>
          </td>
          <td><img src="{{ $plato->imagen_url }}" alt="imagen" height="50px" width="100px"></td>
          <td>{{ $plato->nombre }}</td>
          <td>${{ $plato->precio }}</td>
          <td>
            @if($plato->activo)
              <span class="label label-success">Activado</span>
            @else
              <span class="label label-danger">Desactivado</span>
            @endif
          </td>
          <td>
            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="box-footer">
  {{ $platos->links('vendor.pagination.custom',['maxPages'=>5, 'offset'=>2]) }}
</div>