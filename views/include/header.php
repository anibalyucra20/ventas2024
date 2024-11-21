
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>views/plantilla/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script>
        const base_url = '<?php echo BASE_URL; ?>';
    </script>
</head>

<body>
    <div class="cc">
        <div class="menu_i">
            <img src="https://1000marcas.net/wp-content/uploads/2019/12/Facebook-Logo-2019.png" alt="">
            <ul>
                <li><a href="<?php echo BASE_URL ?>usuario">Inicio</a></li>
                <li><a href="<?php echo BASE_URL ?>producto">Productos</a>
                    <ul>
                        <li><a href="">Producto 1</a></li>
                        <li><a href="">Producto 2</a></li>
                    </ul>
                </li>
                <li><a href="">Categorias</a>
                    <ul>
                        <li><a href="">Caballeros</a>
                            <ul>
                                <li><a href="">Caballero 1</a></li>
                                <li><a href="">Caballero 2</a></li>
                            </ul>
                        </li>
                        <li><a href="">Damas</a>
                            <ul>
                                <li><a href="">Damas 1</a></li>
                                <li><a href="">Damas 2</a></li>
                            </ul>
                        </li>
                        <li><a href="">Niños</a></li>
                        <li><a href="">Niñas</a></li>
                        <li><a href="">Bebés</a></li>
                    </ul>
                </li>
                <li><a href="">Carrito</a></li>
                <li><a href="https://www.facebook.com/anibalyucrac" target="_blank">Mi facebook</a></li>
            </ul>
        </div>
        <div class="cuerpo">
            <div class="menu_s">
                <ul class="nav">
                    <li class="nav1"><a href="">Inicio</a></li>
                    <li class="nav1"><a href="">Productos</a>
                        <ul class="subnav">
                            <li class="nav2"><a href="">Producto 1</a></li>
                            <li class="nav2"><a href="">Producto 2</a></li>
                        </ul>
                    </li>
                    <li class="nav1"><a href="">Categorias</a>
                        <ul class="subnav">
                            <li class="nav2"><a href="">Caballeros</a></li>
                            <li class="nav2"><a href="">Damas</a></li>
                            <li class="nav2"><a href="">Niños</a></li>
                            <li class="nav2"><a href="">Niñas</a></li>
                            <li class="nav2"><a href="">Bebés</a></li>
                        </ul>
                    </li>
                    <li class="nav1"><a href="">Carrito</a></li>
                    <li class="nav1"><a onclick="cerrar_sesion();">Cerrar Sesión</a></li>
                    <li class="nav1"><a><i class="fa fa-user"></i><?php echo $_SESSION['sesion_ventas_nombres']; ?></a></li>
                </ul>
            </div>