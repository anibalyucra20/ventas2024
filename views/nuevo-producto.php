FORMULARIO DE REGISTRO DE PRODUCTO
<form action="" class="form-control" id="frmRegistrar">
    <div class="form-group">
        <label for="">Codigo:</label>
        <input type="text" required  class="form-control" id="codigo" name="codigo">
    </div>
    <div class="form-group">
        <label for="">Nombre:</label>
        <input type="text" required class="form-control" id="nombre" name="nombre">
    </div>
    <div class="form-group">
        <label for="">Detalle:</label>
        <input type="text" class="form-control" required id="detalle" name="detalle">
    </div>
    <div>
        <label for="">Precio:</label>
        <input type="number" class="form-control" required id="precio" name="precio">
    </div>
    <div>
        <label for="">Stock Inicial:</label>
        <input type="number" class="form-control" required id="stock" name="stock">
    </div>
    <div>
        <label for="">Categoría:</label>
        <select name="categoria" id="categoria" class="form-control" required >
            <option>Seleccione</option>
        </select>
    </div>
    <div>
        <label for="">Fecha de vencimiento:</label>
        <input type="date" class="form-control" required id="fecha_v" name="fecha_v">
    </div>
    <div>
        <label for="">Imagen:</label>
        <input type="file" class="form-control" required id="imagen" name="imagen">
    </div>
    <div>
        <label for="">Proveedor:</label>
        <select class="form-control" required id="proveedor" name="proveedor">
            <option value="Seleccione"></option>
        </select>
    </div>
    <br>
    <button type="button" class="btn btn-success" onclick="registrar_producto();">Registrar</button>
</form>

<script src="<?php echo BASE_URL;?>views/js/functions_producto.js"></script>

<script>listar_categorias();</script>
<script>listar_proveedores();</script>