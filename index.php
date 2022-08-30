<?php 
    include 'bd/conexion.php';
    $con = conectar();
    $sql = "SELECT p.id as id, p.nombre_producto, p.precio, c.nombre_categoria, c.id as idcategoria, p.stock FROM productos p, categoria c WHERE p.categoria=c.id ORDER BY p.id ASC";
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
    <title>Productos</title>
</head>
<body>
    <!-- Index principal donde mostramos mensajes -->
    <div class="card-body table-responsive">
        <h5  style="text-align:center"> Listado de productos </h5>
        <?php if (isset($_GET['menssage'])) { ?>
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert"> &times; </button>
                <strong class="text-dark">Se ha editado correctamente el registro</strong>
            </div>
        <?php } ?>
        <?php if (isset($_GET['menssage2'])) { ?>
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert"> &times; </button>
                <strong class="text-dark">Se ha creado correctamente el registro</strong>
            </div>
        <?php } ?>
        <?php if (isset($_GET['menssage3'])) { ?>
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert"> &times; </button>
                <strong class="text-dark">Se ha eliminado correctamente el registro</strong>
            </div>
        <?php } ?>
        <?php if (isset($_GET['menssage4'])) { ?>
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert"> &times; </button>
                <strong class="text-dark">No se pudo eliminar el registro vuelva a intentar</strong>
            </div>
        <?php } ?>
        <?php if (isset($_GET['compravalida'])) { ?>
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert"> &times; </button>
                <strong class="text-dark">Se realizo la compra correctamente</strong>
            </div>
        <?php } ?>
        <div class="card-header">
            <div class="form-inline input-search-data">
                <input class="form-control col-md-3 light-table-filter" data-table="order-table" type="text" placeholder="Buscar">
                <div class="icon-input"></div>
            </div>
            <!-- botones de las acciones permitidas ya sea si seleccionamos un registro o no -->
            <div id="acciones" style="text-align:right;color: rgb(97, 97, 97);text-decoration: none;">
                <a style="cursor: pointer;color: rgb(97, 97, 97);" href="./bd/ventasrealizadas.php" title="Ventas"><i class="material-icons">accessibility</i></a>
                <a style="cursor: pointer;color: rgb(97, 97, 97);" href="venta.php" title="Venta de producto"><i class="material-icons">add_shopping_cart</i></a>
                <a style="cursor: pointer;color: rgb(97, 97, 97);" href="./bd/agregar.php" title="Crear producto"><i class="material-icons">add_circle</i></a>
                <a style="display: none;cursor: pointer;" class="editproduc" title="Editar producto"><i class="material-icons">edit</i></a>                        
                <a style="display: none;cursor: pointer;" class="deleteproduc" title="Eliminar producto"><i class="material-icons">delete</i></a>
                <a style="display: none;cursor: pointer;" title="Detalle producto" id="detalleproduc"><i class="material-icons">info</i></a> 
            </div>
        </div>
        <table class="table table-striped table-hover order-table" style="text-align:center;cursor: pointer;">
            <!-- tabla con toda la informacion -->
            <thead>
                <tr>
                    <th scope="col">Seleccione</th>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre del producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while ($row = mysqli_fetch_array($query)) {
                ?>
                <tr class="valor" data-id="<?php echo $row['id'] ?>">
                    <td><input style="cursor: pointer;" type="radio" value="<?php echo $row['id'] ?>" data-valor="<?php echo $row['id'] ?>" name="valor"></td>
                    <!-- Se utiliza el utf8encode para la codificacion de la iso -->
                    <td><?php echo utf8_encode($row['id']) ?></td>
                    <td><?php echo utf8_encode($row['nombre_producto']) ?></td>
                    <td><?php echo utf8_encode($row['precio']) ?></td>
                    <td><?php echo utf8_encode($row['nombre_categoria']) ?></td>
                    <td><?php echo utf8_encode($row['stock']) ?></td>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>



