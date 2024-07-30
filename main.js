$(document).ready(function(){
    $("#main-content").load("inicio.htm");

    $("#inicio-link").click(function(){
        $("#main-content").load("inicio.htm");
    })

    $("#leer-link").click(function(){
        $("#main-content").load("leer.php");
    })
    //tipoProducto-link
    $("#tipoProducto-link").click(function(){
        $("#main-content").load("leertipoProducto.php");
    })
});