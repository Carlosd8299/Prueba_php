<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM ingreso WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $idfarmaco = $row['id_farmaco'];
    $fecha_vencimiento = $row['fecha_vencimiento'];
    $cantidad = $row['cantidad'];
  }
}


if (isset($_POST['going'])) {
  header('Location: view/ingreso.php');
}

if  (isset($idfarmaco)) {
  $query2 = "SELECT * FROM farmaco WHERE id=$idfarmaco";
  $result = mysqli_query($conn, $query2);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre_farmaco = $row['nombre'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $edIngresoCantidad= $_POST['edit_ingreso_cantidad'];
  $edIngresoFechaVen = $_POST['edit_ingreso_fecha_ven'];
    $hoy = date("YYYY-MM-DD");
    
  if(date('Y-m-d') < date('Y-m-d', strtotime($fecha_vencimiento)) ){
    //echo not yet expired! 
    $query3 = "UPDATE `ingreso` set `cantidad` = '$edIngresoCantidad', `fecha_vencimiento` = '$edIngresoFechaVen' WHERE `Id`=$id";
    mysqli_query($conn, $query3);
    $_SESSION['message'] = 'Task Updated Successfully';
    $_SESSION['message_type'] = 'success';
    header('Location: view/ingreso.php');
}else{?>
  
  <div class="alert alert-danger" role="alert">
  no se puede actualizar debido que la fecha de vencimiento ya caduco!
</div>


  <?php
}

     }?>

<?php include('includes/header.php'); ?>
<div class="container p-4">
<div class="row"><h4>Editar ingreso de: <?php echo$nombre_farmaco?></h4>
</div>
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_ingreso.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="edit_ingreso_cantidad" type="number" class="form-control" value="<?php echo $cantidad; ?>" placeholder="Editar cantidad de ingreso">
        </div>
        <div class="form-group">
          <input name="edit_ingreso_fecha_ven" type="date" class="form-control" value="<?php echo $fecha_vencimiento; ?>" placeholder="Editar fecha de vencimiento">
        </div>
        <button class="btn btn-success" name="update">
          Actualizar <?php echo $nombre_farmaco?></button>
      </form>
      </div>
    </div>
  </div>
  <a href="view/ingreso.php" class="btn btn-primary">Ir a Ingresos</a>
</div>

<?php include('includes/footer.php'); ?>