<?php
include ("conexion.php");

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $precio=$_POST['precio'];
    $tipo_id=$_POST['tipo_id'];


    $sql="UPDATE producto SET `nombre`='$nombre',`precio`='$precio',
    `tipo_id`='$tipo_id' WHERE id='$id'";

    $resultado=mysqli_query($conn,$sql);   

    if($conn->query($sql)==true){
        header("Location:leer.php?msg=Ha sido modificado el Producto");
    }else{
            echo "Error".$sql."<br>".$conn->error;
        }}
else{
    $id=$_GET['id'];

    $sql="SELECT *from producto where id='$id'";  
   
    $resultado=$conn->query($sql);
    
    $producto=$resultado->fetch_assoc();
   
    $sql="SELECT *FROM tipoproducto";
    $tipos=$conn->query($sql);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #E9967A;">
    CONEXION PHP Y MYSQL 
  </nav>
    <h1 class="text-primary">Modificar datos</h1>

    <form method="POST">
    
        Nombre: <input type="text" name="nombre" value="<?php echo $producto['nombre']?>"><br>
        Precio: Q <input type="text" name="precio" value="<?php echo $producto['precio']?>"><br>
        Tipo de producto
        <select name="tipo_id">
        <?php while($row=$tipos->fetch_assoc()) {?>
                <option value="<?php echo$row['id']; ?>">          
                <?php echo $row['nombre']; ?></option>
                <?php } ?>
        </select><br>

        <!--<input type="submit" value="Insertar Producto"> -->
        <input class="btn btn-outline-success" type="submit" value="Modificar datos delProducto">
        <a class="btn btn-outline-danger" href="index.htm" role="button">Cancelar</a>




    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
