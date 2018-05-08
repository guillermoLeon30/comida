<div class="modal fade" id="modalIngresar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Plato</h4>
      </div>
      <form id="formIngresarPlato" class="form-horizontal">
        <div class="modal-body">
          <div class="form-group">
            <label class="col-sm-2 control-label">Nombre</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="nombre">
              <input type="hidden" name="menu_id" value="{{ $menu->id }}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Precio</label>

            <div class="col-sm-10">
              <div class="input-group">
                <span class="input-group-addon">$</span>
                <input type="text" class="form-control" name="precio">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Imagen</label>

            <div class="col-sm-10">
              <input id="imagen" type="file" name="imagen">
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>