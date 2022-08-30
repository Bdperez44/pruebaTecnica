<?php 
    include './bd/conexion.php';
    $con = conectar();
    $id = $_GET['id'];
    //$sql = "SELECT * FROM productos WHERE id = '$id' ";
    $sql = "SELECT p.id as id, p.nombre_producto, p.referencia, p.precio, c.nombre_categoria, p.peso, p.fecha_creacion, c.id as idcategoria, p.stock FROM productos p, categoria c WHERE p.categoria=c.id and p.id = '$id'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($query);
?>
<div class="modal fade" id="exampleModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Detalle producto</h5>
                </button>
            </div>
            <div class="modal-body" style="text-align: left;">
                <div class="container">
                    <div class="row mb-3">                        
                        <div class="col"><strong>Nombre del producto:</strong>  <p><?php echo $row['nombre_producto']; ?></p></div>
                        <div class="col"><strong>Referencia:</strong> <p><?php echo $row['referencia']; ?></p></div>
                        <div class="col"><strong>Precio:</strong> <p><?php echo $row['precio']; ?>$</p></div>                        
                   </div>
                </div>
                <hr>                
                <div class="container">
                    <div class="row mb-3">                        
                        <div class="col"><strong>Peso:</strong> <p><?php echo $row['peso']; ?>gr</p></div>
                        <div class="col"><strong>Categoria:</strong> <p><?php echo $row['nombre_categoria']; ?></p></div>
                        <div class="col"><strong>Stock:</strong> <p><?php echo $row['stock']; ?></p></div>                    
                   </div>
                </div>
                <hr>
                <div class="container">
                    <div class="row mb-3">                        
                        <div class="col"><strong>Fecha de creacion:</strong> <p><?php echo $row['fecha_creacion']; ?></p></div>                        
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>