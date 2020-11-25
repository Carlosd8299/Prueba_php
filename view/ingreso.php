<?php
include("../db.php");
?>
<?php
include("../includes/header.php");
?>

<div class="container p-4">
  <div class="row">
        <div class="col-md-4">
    
      <!-- MESSAGES -->
      <?php
if (isset($_SESSION['message'])) {
?>
     <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
    session_unset();
}
?>

      <!-- ADD INGRESO FORM -->
          <div class="card card-body">
              <form action="../save_ingreso.php" method="POST">
              <div class="form-group">
                  <select name="select_farmaco_ingreso" class="form-control">
                    <?php
                      $consultarfarmaco ="SELECT * FROM farmaco";
                      $ejecutarfarmaco=mysqli_query($conn, $consultarfarmaco);

                      while($row = mysqli_fetch_assoc($ejecutarfarmaco)){
                            $id = $row['Id'];
                            $nombre = $row['nombre'];
                     ?>
                        <option value="<?php echo $id; ?>"><?php echo $nombre ?></option>
                      
                      <?php
                      }
                    ?>
                    </select></div>
                  <div class="form-group">
                      <input type="number" name="cantidad_ingreso" class="form-control" placeholder="Cantidad a ingresar" autofocus>
                  </div>
                  <div class="form-group">
                    <label>Fecha de vencimiento del farmaco</label>
                      <input type="date" name="fecha_vencimiento_ingreso" class="form-control" placeholder="Fecha de vencimiento del farmaco" autofocus>
                  </div>
                  <input type="submit" class="btn btn-primary" name="save_ing" value="Registrar Ingreso">
              </form>
          </div>
      </div>
      <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Id del farmaco</th>
            <th>Cantidad</th>
            <th>Fecha Ingreso</th>
            <th>Fecha Vencimiento</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
<!-- SHOWING LABS IN TABLE -->
            <?php
$query        = "SELECT * FROM ingreso";
$result_tasks = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result_tasks)) {
?>
               <tr>
                <td><?php echo $row['id_farmaco'];?></td>
                <td><?php echo $row['cantidad'];?></td>
                <td><?php echo $row['fecha_ingreso'];?></td>
                <td><?php echo $row['fecha_vencimiento'];?></td> 

               
                    <a href="../delete_ingreso.php?id=<?php echo $row['Id']; ?>" class="btn btn-danger">
                    <i class="far fa-trash-alt"></i></a>

                </td>
                </tr>
                <?php
}
?>
       </tbody>
    </div>
  </div>  
  
</div>







<?php
include("../includes/footer.php");
?>
