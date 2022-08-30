<?php
    include "conexion.php";
    $con = conectar();
    $name = $_POST['name'];
    $reference = $_POST['reference'];
    $price = $_POST['price'];
    $weight = $_POST['weight'];
    $category = $_POST['category'];
    $stock = $_POST['stock'];
    $datecreate = date('m-d-Y', time());
    if($name != "" && $reference != "" && $price != "" && $weight != "" && $category != "" && $stock != "" && $datecreate != ""){
        $sql = "INSERT INTO productos (id,nombre_producto,referencia,precio,peso,categoria,stock,fecha_creacion) VALUES(default,'$name','$reference','$price','$weight','$category','$stock','$datecreate')";
        $query = mysqli_query($con, $sql);
        if($query){
            header("location: ../index.php?menssage2");
        }else{
            header('Location:agregar.php?mensaje');
        }
    }
    else{
        header('Location:agregar.php?mensaje');
    }
?>