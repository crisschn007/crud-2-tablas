<?php
//insertar
include 'conexion.php';

if($_SERVER["REQUEST_METHOD"]=="POST") {
    //guardamos en variables los valores que
    //vamos a enviar a la base de datos

    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $tipo_id = $_POST['tipo_id'];

    //creamos la consulta de insertar

    $sql = "INSERT INTO producto(nombre,precio,tipo_id) values
('$nombre','$precio','$tipo_id')";

    if ($conn->query($sql) == TRUE) {
        //echo "Producto ha sido insertado exitosamente";
        header("Location:leer.php?msg=Ha sido agregado un Nuevo Producto");
    } else {
        echo "Error! " . $sql . "<br>" - $conn->error;
    }
}
//ahora voy hacer el select para seleccionar el tipo de producto
$sql = "SELECT *FROM tipoproducto";
$resultado = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #E9967A;">
    CONEXION PHP Y MYSQL
  </nav>
    <h1 class="text-primary">Insertar datos</h1>
   
    <form method="POST" action="insertar.php">
        Nombre: <input type="text" name="nombre" ><br><br>
        Precio: Q <input type="text" name="precio"><br><br>
        Tipo de producto
        <select name="tipo_id" id="">
            <?php
            while ($row = $resultado->fetch_assoc()) { ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
            <?php } ?>
        </select><br><br>

        <!--<input type="submit" value="Insertar Producto"> -->
        <input class="btn btn-outline-success" type="submit" value="Insertar Producto">
        <a class="btn btn-outline-danger" href="index.htm" role="button">Cancelar</a>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
