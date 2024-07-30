<?php
include("conexion.php");
$id = $_GET['id'];

$sql="DELETE FROM producto where id='$id'";
if($conn->query($sql)==TRUE){
    echo 'Producto ha sido eliminado de la base de datos';
}
else{
    echo "Error: ".$sql- "<br>" .$conn->error;

}
?>
<a href="index.htm">Regresar a lista de productos</a>