<!-- Modal -->
 
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Añadir Servicio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <div class="modal-body">
                <form id="SubTipoForm" name="SubTipoForm">
                    <div class="form-group">
                        {{ csrf_field() }}
                        <label for="recipient-name" class="form-control-label">Servicio:</label>
                        <select class="servicio form-control" name="id_tipo" id="IdTipo">
                            <option value="" selected="selected" disabled="true">-- Seleccione una opción --</option>
                            @foreach( $tipos as $tipo )
                                <option value=" {{ $tipo->id_tipo }} "> {{ $tipo->nombre }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Análisis:</label>
                        <input type="text" class="form-control"  name="nombre"onkeyup="MayusculaGuiones(this)">
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cerrar </button>
            <button type="button" class="btn btn-primary" id="btn_guardar_subtipo">Guardar</button>
        </div>
    </div>
</div>
