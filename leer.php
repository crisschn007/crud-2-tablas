<?php 
include 'conexion.php';
$sql='SELECT p.id, p.nombre, p.precio, tp.nombre as tipo 
FROM producto p, tipoproducto tp where tp.id=p.tipo_id';
$resultado=$conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Leer</title>
</head>
<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #E9967A;">
    CONEXION PHP Y MYSQL Listado de Producto
  </nav>
    <br><br>

    <div class="container">
    <?php
    if(isset($_GET['msg'])){
      $msg=$_GET['msg'];
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      '.$msg.'
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
    ?>

    <a href="insertar.php" class="btn btn-info">Agregar Nuevo Producto</a>  


    <br><br>
<table class="table table-striped-columns table-info">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Precio</th>
      <th scope="col">Tipo de Producto</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
        <?php
   while($row=$resultado->fetch_assoc())
   { ?>
  <tbody>
    <tr>
      
      <td><?php echo $row['id'] ?></td>
      <td><?php echo $row['nombre'] ?></td>
      <td><?php echo $row['precio'] ?></td>
      <td><?php echo $row['tipo'] ?></td>
      <td>
        <a href="editar.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-pencil"></i></a>
        <a href="eliminar.php?id=<?php echo $row['id']?>" class="link-danger"><i class="fa-solid fa-trash-can"></i></a>
    </td>
    </tr>
    <?php } ?>
        
  </tbody>
</table>
</div>

<script src="https://kit.fontawesome.com/a59a082974.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>