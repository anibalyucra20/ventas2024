async function listar_productos() {
    try {
        let respuesta = await fetch(base_url + 'controller/Producto.php?tipo=listar');
        let json = await respuesta.json();
        if (json.status) {
            let datos = json.contenido;
            let cont = 0;
            datos.forEach(item => {
                let nueva_fila = document.createElement("tr");
                nueva_fila.id = "fila" + item.id;
                cont += 1;
                nueva_fila.innerHTML = `
                            <th>${cont}</th>
                            <td>${item.codigo}</td>
                            <td>${item.nombre}</td>
                            <td>${item.stock}</td>
                            <td>${item.categoria.nombre}</td>
                            <td>${item.id_proveedor}</td>
                            <td>${item.options}</td>
                `;
                document.querySelector('#tbl_producto').appendChild(nueva_fila);
            });
        }
        console.log(json);
    } catch (error) {
        console.log("Oops salio un error " + error);
    }
}
if (document.querySelector('#tbl_producto')) {
    listar_productos();
}



async function registrar_producto() {
    let codigo = document.getElementById('codigo').value;
    let nombre = document.querySelector('#nombre').value;
    let detalle = document.querySelector('#detalle').value;
    let precio = document.querySelector('#precio').value;
    let stock = document.querySelector('#stock').value;
    let categoria = document.querySelector('#categoria').value;
    let fecha_v = document.querySelector('#fecha_v').value;
    let imagen = document.querySelector('#imagen').value;
    let proveedor = document.querySelector('#proveedor').value;
    if (codigo == "" || nombre == "" || detalle == "" || precio == "" || stock == "" || categoria == "" || fecha_v == "" || imagen == "" || proveedor == "") {
        alert("error, campos vacios");
        return;
    }
    try {
        // capturamos datos del formulario html
        const datos = new FormData(frmRegistrar);
        //enviar datos hacia el controlador
        let respuesta = await fetch(base_url + 'controller/Producto.php?tipo=registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (json.status) {
            swal("Registro", json.mensaje, "success");
        } else {
            swal("Registro", json.mensaje, "error");
        }

        console.log(json);
    } catch (e) {
        console.log("Oops, ocurrio un error " + e);
    }
}

async function listar_categorias() {
    try {
        let respuesta = await fetch(base_url + 'controller/Categoria.php?tipo=listar');
        json = await respuesta.json();
        if (json.status) {
            let datos = json.contenido;
            let contenido_select = '<option value="">Seleccione</option>';
            datos.forEach(element => {
                contenido_select += '<option value="' + element.id + '">' + element.nombre + '</option>';
                // se trabaja con jquery
                /*$('#categoria').append($('<option />', {
                    text: `${element.nombre}`,
                    value: `${element.id}`
                }));*/
            });
            document.getElementById('categoria').innerHTML = contenido_select;
        }

        console.log(respuesta);
    } catch (e) {
        console.log("Error al cargar categorias" + e);
    }
}
async function listar_proveedores() {
    try {
        let respuesta = await fetch(base_url + 'controller/Persona.php?tipo=listar_proveedor');
        json = await respuesta.json();
        if (json.status) {
            let datos = json.contenido;
            let contenido_select = '<option value="">Seleccione</option>';
            datos.forEach(element => {
                contenido_select += '<option value="' + element.id + '">' + element.razon_social + '</option>';
                // se trabaja con jquery
                /*$('#categoria').append($('<option />', {
                    text: `${element.nombre}`,
                    value: `${element.id}`
                }));*/
            });
            document.getElementById('proveedor').innerHTML = contenido_select;
        }

        console.log(respuesta);
    } catch (e) {
        console.log("Error al cargar categorias" + e);
    }
}

async function ver_producto(id) {
    //console.log('hola soy la funcion ver');
    const formData = new FormData();
    formData.append('id_producto', id);
    try {
        let respuesta = await fetch(base_url + 'controller/Producto.php?tipo=ver', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: formData
        });
        json = await respuesta.json();
        if (json.status) {
            document.querySelector('#id_producto').value = json.contenido.id;
            document.querySelector('#codigo').value = json.contenido.codigo;
            document.querySelector('#nombre').value = json.contenido.nombre;
            document.querySelector('#detalle').value = json.contenido.detalle;
            document.querySelector('#precio').value = json.contenido.precio;
            document.querySelector('#categoria').value = json.contenido.id_categoria;
            document.querySelector('#fecha_v').value = json.contenido.fecha_vencimiento;
            document.querySelector('#proveedor').value = json.contenido.id_proveedor;
            document.querySelector('#img').value = json.contenido.imagen;
        } else {
            window.location = base_url + "productos";
        }
        console.log(json);
    } catch (error) {
        console.log("oops ocurrio un error " + error);
    }
}
async function actualizar_producto() {
    const datos = new FormData(frmActualizar);
    try {
        let respuesta = await fetch(base_url + 'controller/Producto.php?tipo=actualizar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        console.log(json);
    } catch (e) {
        
    }
}

async function eliminar_producto(id) {
    swal({
        title: "Realmente desea eliminar el producto?",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true
    }).then((willDelete)=>{
        if (willDelete) {
           fnt_eliminar(id); 
        }
    })
}

async function fnt_eliminar(id) {
    const formdata = new FormData();
    formdata.append('id_producto', id);
    try {
        let respuesta = await fetch(base_url + 'controller/Producto.php?tipo=eliminar',{
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: formdata
        });
        json = await respuesta.json();
        if (json.status) {
            swal("Eliminar", "eliminado correctamente", "success");
            document.querySelector('#fila'+id).remove();
        }else{
            swal('Eliminar', 'Error al eliminar producto', 'warning');
        }
    } catch (e) {
        console.log("ocurrio error "+ e);
    }
}