<?php  
    /* Se realiza la conexion a la base de datos de manera sencilla para el crud */
    function conectar(){
        $host = "localhost";
        $user = "root";
        $pass = "";
        $bd = "inventario";
        $conn = mysqli_connect($host, $user, $pass);
        mysqli_select_db($conn, $bd);
        return $conn;
    }
?>