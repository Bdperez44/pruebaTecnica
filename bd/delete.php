<?php
    include "conexion.php";
    $con = conectar();
    $id = $_GET['id'];
    $sql = "DELETE FROM productos WHERE id = '$id'";
    $query = mysqli_query($con, $sql);

    if($query){
        header("location: ../index.php?menssage3");
    }else{
        header("location: ../index.php?menssage4");
    }
?>