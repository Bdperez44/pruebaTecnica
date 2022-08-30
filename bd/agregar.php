<?php 
    include 'conexion.php';
    $con = conectar();
    $sql = "SELECT * FROM categoria";
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
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Agregar productos</title>
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
                                    <strong class="text-dark">No se pudo crear el producto ya que tiene campos vacios o tiene un error en la conexion porfavor vuelva a intentar</strong>
                                </div>

                            <?php } ?>
                            <form action="insert.php" method="post">
                                <label for="name">Nombre del producto:</label>
                                <input class="form-control" type="text" name="name" id="name" placeholder="Nombre del producto">
                                <label for="reference">Referencia del producto:</label>
                                <input class="form-control" type="number" name="reference" id="reference" placeholder="Referencia del producto">
                                <label for="price">Precio del producto en pesos ($):</label>
                                <input class="form-control" type="number" name="price" id="price" placeholder="Precio del producto">
                                <label for="weight">Peso del producto en gramos(GR):</label>
                                <input class="form-control" type="number" name="weight" id="weight" placeholder="Peso del producto">
                                <label for="category">Categoria del producto:</label>
                                <select class="form-control" name="category" id="category">
                                    <option value="">Selecione...</option>
                                    <?php while ($row = mysqli_fetch_array($query)) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo utf8_encode($row['nombre_categoria']); ?></option>
                                    <?php } ?>
                                </select>
                                <label for="stock">Stock del producto:</label>
                                <input class="form-control" type="number" name="stock" id="stock" placeholder="Stock del producto">
                                <div class="enviar">
                                    <input type="submit" value="Crear Producto" id="enviar" class="btn btn-success">  
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


