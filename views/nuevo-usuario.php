FORMULARIO DE REGISTRO DE PERSONAS
<form action="" class="form-control" id="frmRegistrar">
    <div class="form-group">
        <label for="">DNI:</label>
        <input type="text" required  class="form-control" id="dni" name="dni">
    </div>
    <div class="form-group">
        <label for="">Razon Social:</label>
        <input type="text" required class="form-control" id="razon_social" name="razon_social">
    </div>
    <div class="form-group">
        <label for="">Telefono:</label>
        <input type="text" class="form-control" required id="telefono" name="telefono">
    </div>
    <div>
        <label for="">Correo:</label>
        <input type="email" class="form-control" required id="correo" name="correo">
    </div>
    <div>
        <label for="">Departamento:</label>
        <input type="text" class="form-control" required id="departamento" name="departamento">
    </div>
    <div>
        <label for="">Provincia:</label>
        <input type="text" class="form-control" required id="provincia" name="provincia">
    </div>
    <div>
        <label for="">Distrito:</label>
        <input type="text" class="form-control" required id="distrito" name="distrito">
    </div>
    <div>
        <label for="">Cod. Postal:</label>
        <input type="text" class="form-control" required id="codpostal" name="codpostal">
    </div>
    <div>
        <label for="">Direccion:</label>
        <input type="text" class="form-control" required id="direccion" name="direccion">
    </div>
    <div>
        <label for="">Rol:</label>
        <select class="form-control" required id="rol" name="rol">
            <option value="Seleccione"></option>
            <option value="Administrador">Administrador</option>
            <option value="Vendedor">Vendedor</option>
            <option value="Cliente">Cliente</option>
            <option value="Proveedor">Proveedor</option>
        </select>
    </div>
    <br>
    <button type="button" class="btn btn-success" onclick="registrar_persona();">Registrar</button>
</form>

<script src="<?php echo BASE_URL;?>views/js/functions_persona.js"></script>