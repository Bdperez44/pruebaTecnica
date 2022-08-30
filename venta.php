<?php 
    include 'bd/conexion.php';
    $con = conectar();
    $sql = "SELECT * FROM productos";
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
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Productos</title>
</head>
<body>
    <div class="card-body table-responsive">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" style="text-align:center;"> Venta de productos </h4>
                            <?php if (isset($_GET['mensaje'])) { ?>
                                <div class="alert alert-dismissible alert-danger">
                                    <button type="button" class="close" data-dismiss="alert"> &times; </button>
                                    <strong class="text-dark">No se pudo realizar la compra ya que tiene campos vacios</strong>
                                </div>
                            <?php } ?>
                            <?php if (isset($_GET['mensaje2'])) { ?>
                                <div class="alert alert-dismissible alert-danger">
                                    <button type="button" class="close" data-dismiss="alert"> &times; </button>
                                    <strong class="text-dark">No se pudo realizar la compra ya que la cantidad solicitada es mayor a la que hay disponible</strong>
                                </div>
                            <?php } ?>
                            <?php if (isset($_GET['compranovalida'])) { ?>
                                <div class="alert alert-dismissible alert-danger">
                                    <button type="button" class="close" data-dismiss="alert"> &times; </button>
                                    <strong class="text-dark">No se pudo realizar la compra verifique su conexion</strong>
                                </div>
                            <?php } ?>
                            <?php if (isset($_GET['fail'])) { ?>
                                <div class="alert alert-dismissible alert-danger">
                                    <button type="button" class="close" data-dismiss="alert"> &times; </button>
                                    <strong class="text-dark">No se pudo realizar la compra verifique su conexion</strong>
                                </div>
                            <?php } ?>
                            <form action="./bd/ventaproducto.php" method="post">
                                <label for="namecomprador">Nombre del comprador:</label>
                                <input class="form-control" type="text" name="namecomprador" id="namecomprador" placeholder="Nombre del comprador">
                                <label for="tel">Telefono del comprador:</label>
                                <input class="form-control" type="number" name="tel" id="tel" placeholder="Telefono del comprador">
                                <label for="direccion">Direccion del comprador:</label>
                                <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Direccion del comprador">
                                <label for="producto">Producto:</label>
                                <select class="form-control" name="producto" id="producto">
                                    <option value="">Selecione...</option>
                                    <?php while ($row = mysqli_fetch_array($query)) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre_producto']; ?></option>
                                    <?php } ?>
                                </select>
                                <label for="cantidad">Cantidad:</label>
                                <input class="form-control" type="text" name="cantidad" id="cantidad" placeholder="Categoria del producto">                            
                                <div class="enviar">
                                    <input type="submit" value="Comprar" id="enviar" class="btn btn-success">  
                                    <a class="btn btn-primary" style="margin-left:5px;" href="./index.php" role="button"> Cancelar </a>            
                                </div>   
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div> 
</body>
    <!-- JavaScript Bundle with Popper -->
    <script src="./js/validar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</html>



