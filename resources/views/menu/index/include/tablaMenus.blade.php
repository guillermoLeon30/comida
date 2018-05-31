<div class="box-body table-responsive no-padding">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Estado</th>
        <th>Nombre</th>
        <th>Opciones</th>
      </tr>
    </thead>

    <tbody>
      @foreach($menus as $menu)
      <tr>
        @if($menu->activo)
          <td><span class="label label-success">Activado</span></td>
        @else
          <td><span class="label label-danger">Desactivado</span></td>
        @endif

        <td>{{ $menu->nombre }}</td>

        <td>
          @if($menu->activo)
            <button class="btn btn-success disabled">
              Activar
            </button>
          @else
            <button class="btn btn-success" onclick="activar({{ $menu->id }})">
              Activar
            </button>
          @endif

          <a class="btn btn-info" href="{{ url('menu') }}/{{ $menu->id }}/edit">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
          </a>

          <button class="btn btn-danger">
            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
          </button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="box-footer">
  {{ $menus->links('vendor.pagination.custom',['maxPages'=>5, 'offset'=>2]) }}
</div>