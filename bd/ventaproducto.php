<?php
    include "conexion.php";
    $con = conectar();
    $namecomprador = $_POST['namecomprador'];
    $tel = $_POST['tel'];
    $direccion = $_POST['direccion'];
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];   
    
    $sql = "SELECT stock FROM productos WHERE id='$producto'";
    $query = mysqli_query($con, $sql);
    
    $row = mysqli_fetch_array($query);

    if($namecomprador != "" && $tel != "" && $direccion != "" && $producto != "" && $cantidad != ""){
        if ($cantidad > $row['stock']) {
            header('Location:../venta.php?mensaje2');
        }else{
            $resta = $row['stock']-$cantidad;
            $sql = "INSERT INTO ventas (id,nombre_comprador,telefono_comprador,direccion_comprador,producto,cantidad) VALUES(default,'$namecomprador','$tel','$direccion','$producto','$cantidad')";
            $query = mysqli_query($con, $sql);
            if($query){
                $sql = "UPDATE productos SET stock=$resta WHERE id='$producto' ";
                $query = mysqli_query($con, $sql);
                if ($query) {
                    header("location: ../index.php?compravalida");
                }else{
                    header('Location:../venta.php?compranovalida');
                }                
            }else{
                header('Location:../venta.php?fail');
            }
        }
    }else{
        header('Location: ../venta.php?mensaje');
    }
?>