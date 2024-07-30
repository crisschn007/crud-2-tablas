<?php
//insertar
include 'conexion.php';

$id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //guardamos en variables los valores que
    //vamos a enviar a la base de datos

    $nombre = $_POST['nombre'];

    $sql = "UPDATE `tipoproducto` SET `nombre`='$nombre' WHERE id=$id";
    if ($conn->query($sql) == true) {
        header("Location:leertipoProducto.php?msg=Ha sido modificado el Tipo de Producto");
    } else {
        echo "Error" . $sql . "<br>" . $conn->error;
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
    <h1 class="text-primary">Modificar Tipo de Producto</h1>
    <?php
    $sql = "SELECT * FROM `tipoproducto` WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);
    ?>
    <form method="POST" action="editartipoProducto.php">
        Nombre: <input type="text" name="nombre" value="<?php  echo$row['nombre'] ?>"><br><br>

        <!--<input type="submit" value="Insertar Producto"> -->
        <input class="btn btn-outline-success" type="submit" value="Modificar el Tipo Producto">
        <a class="btn btn-outline-danger" href="index.htm" role="button">Cancelar</a>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>