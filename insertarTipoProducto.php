<?php
//insertar
include 'conexion.php';

if($_SERVER["REQUEST_METHOD"]=="POST") {
    //guardamos en variables los valores que
    //vamos a enviar a la base de datos

    $nombre = $_POST['nombre'];

    //creamos la consulta de insertar
$sql="INSERT INTO `tipoproducto`(`nombre`) VALUES ('$nombre')";
$resultado= mysqli_query($conn,$sql);
    if($resultado){
        header("Location:leertipoProducto.php?msg=Ha sido creada una nueva Categoria");
    } else{
        echo "Error" .mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tipo de Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #E9967A;">
    CONEXION PHP Y MYSQL
  </nav>
    <h1 class="text-primary">Insertar Tipo de Producto</h1>
    <form method="POST" action="insertarTipoProducto.php">
        Nombre: <input type="text" name="nombre" ><br><br>
       
        <!--<input type="submit" value="Insertar Producto"> -->
        <input class="btn btn-outline-success" type="submit" value="Insertar Producto">
        <a class="btn btn-outline-danger" href="index.htm" role="button">Cancelar</a>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
