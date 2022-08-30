<?php
    include "conexion.php";
    $con = conectar();
    $id = $_POST['id'];
    $name = $_POST['name'];
    $reference = $_POST['reference'];
    $price = $_POST['price'];
    $weight = $_POST['weight'];
    $category = $_POST['category'];
    $stock = $_POST['stock'];
    $datecreate = date('Y-m-d', time());
    if($id != "" && $name != "" && $reference != "" && $price != "" && $weight != "" && $category != "" && $stock != "" && $datecreate != ""){
        $sql = "UPDATE productos SET nombre_producto='$name', referencia='$reference', precio='$price', peso='$weight', categoria='$category', stock='$stock',fecha_creacion='$datecreate' WHERE id='$id' ";
        $query = mysqli_query($con, $sql);
        if($query){
            header("location: ../index.php?menssage");
        }else{
            header('Location:editar.php?mensaje&id='.$id);
        }
    }
    else{
        header('Location:editar.php?mensaje&id='.$id);
    }
?>