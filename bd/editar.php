<?php 
    include 'conexion.php';
    $con = conectar();
    $id = $_GET['id'];
    $sql = "SELECT * FROM productos WHERE id = '$id' ";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($query);

    $sqlcategoria = "SELECT * FROM categoria";
    $querycategoria = mysqli_query($con, $sqlcategoria);

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
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Editar productos</title>
</head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" style="text-align:center;"> Datos del producto </h4>
                            <?php if (isset($_GET['mensaje'])) { ?>
                                <div class="alert alert-dismissible alert-danger">
                                    <button type="button" class="close" data-dismiss="alert"> &times; </button>
                                    <strong class="text-dark">No se pudo editar el producto ya que tiene campos vacios o tiene un error en la conexion porfavor vuelva a intentar</strong>
                                </div>

                            <?php } ?>
                            <form action="update.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                <label for="name">Nombre del producto:</label>
                                <input class="form-control" type="text" name="name" id="name" value="<?php echo $row['nombre_producto'] ?>" placeholder="Nombre del producto">
                                <label for="reference">Referencia del producto:</label>
                                <input class="form-control" type="number" name="reference" id="reference" value="<?php echo $row['referencia'] ?>" placeholder="Referencia del producto">
                                <label for="price">Precio del producto en pesos ($):</label>
                                <input class="form-control" type="number" name="price" id="price" value="<?php echo $row['precio'] ?>" placeholder="Precio del producto">
                                <label for="weight">Peso del producto en gramos(GR):</label>
                                <input class="form-control" type="number" name="weight" id="weight" value="<?php echo $row['peso'] ?>" placeholder="Peso del producto">
                                <label for="category">Categoria del producto:</label>                                
                                <select class="form-control" name="category" id="category">
                                    <?php 
                                    while ($rowcategoria = mysqli_fetch_array($querycategoria)) { 
                                        if($row['categoria'] == $rowcategoria['id']){
                                            ?>
                                            <option selected value="<?php echo $rowcategoria['id']; ?>"><?php echo utf8_encode($rowcategoria['nombre_categoria']); ?></option>
                                            <?php                                            
                                        }else{
                                            ?>
                                                <option value="<?php echo $rowcategoria['id']; ?>"><?php echo utf8_encode($rowcategoria['nombre_categoria']); ?></option>
                                            <?php 
                                        }
                                    } ?>
                                </select>                               
                                <label for="stock">Stock del producto:</label>
                                <input class="form-control" type="number" name="stock" id="stock" value="<?php echo $row['stock'] ?>" placeholder="Stock del producto">
                                <div class="enviar">
                                    <input type="submit" value="Editar Producto" id="enviar" class="btn btn-success">  
                                    <a class="btn btn-primary" style="margin-left:5px;" href="../index.php" role="button"> Cancelar </a>            
                                </div>   
                            </form>
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


