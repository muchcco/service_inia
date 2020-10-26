<!-- Modal -->
 
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Añadir Usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <div class="modal-body">
                <form id="UserForm" name="UserForm">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control"  name="name"onkeyup="MayusculaGuiones(this)">
                    </div>  
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Apellido:</label>
                        <input type="text" class="form-control"  name="last_name"onkeyup="MayusculaGuiones(this)">
                    </div> 
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Email:</label>
                        <input type="email" class="form-control"  name="email" onkeyup="MayusculaGuiones(this)">                        
                    </div> 
                    <div class="form-group">                   
                        <label for="recipient-name" class="form-control-label">Rol:</label>
                        <select class="form-control" name="role_id" >
                            <option value="" selected="selected" >-- Seleccione una opción --</option>
                            @foreach( $roles as $role )
                                <option value="{{ $role->id }}"> {{ $role->descripcion }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">                   
                        <label for="recipient-name" class="form-control-label">Sede:</label>
                        <select class="form-control" name="id_sede" >
                            <option value="" selected="selected" >-- Seleccione una opción --</option>
                            @foreach( $sedes as $sede )
                                <option value="{{ $sede->idsede }}"> {{ $sede->denominacion }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Contraseña:</label>
                        <input type="password" class="form-control"  name="password" >
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cerrar </button>
            <button type="button" class="btn btn-primary" id="btn_guardar_usuario">Guardar</button>
        </div>
    </div>
</div>
