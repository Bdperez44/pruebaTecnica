<?php 
    include 'conexion.php';
    $con = conectar();
    $sql = "SELECT * FROM ventas v, productos p WHERE v.producto = p.id ORDER BY v.id ASC";
    $query = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Ventas</title>
</head>
<body>

    <div class="card-body table-responsive">
        <h5  style="text-align:center"> Listado de ventas </h5>        
        <div class="card-header">
            <div class="form-inline input-search-data">
                <input class="form-control col-md-3 light-table-filter" data-table="order-table" type="text" placeholder="Buscar">
                <div class="icon-input"></div>
            </div>
            <div id="acciones" style="text-align:right;color: rgb(97, 97, 97);text-decoration: none;">
                <a style="cursor: pointer;color: rgb(97, 97, 97);" href="../index.php" title="Regresar"><i class="material-icons">arrow_back</i></a>
            </div>
        </div>
        <table class="table table-striped table-hover order-table" style="text-align:center;cursor: pointer;">
            <thead>
                <tr>
                    <th scope="col">Nombre del comprador</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while ($row = mysqli_fetch_array($query)) {
                ?>
                <tr class="valor" data-id="<?php echo $row['id'] ?>">
                    <!-- Se utiliza el utf8encode para la codificacion de la iso -->
                    <td><?php echo utf8_encode($row['nombre_comprador']) ?></td>
                    <td><?php echo utf8_encode($row['telefono_comprador']) ?></td>
                    <td><?php echo utf8_encode($row['direccion_comprador']) ?></td>
                    <td><?php echo utf8_encode($row['nombre_producto']) ?></td>
                    <td><?php echo utf8_encode($row['cantidad']) ?></td>
                </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>
    </div>
    <div id="modales">
    </div>    
</body>
    <!-- JavaScript Bundle with Popper -->
    <script src="./js/validar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</html>



