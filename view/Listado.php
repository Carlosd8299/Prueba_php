<?php
include("../db.php");
?>
<?php
include("../includes/header.php");
?>


<div class="container p-4">
<h5>El sistema debe permitir ver los productos creados a una fecha (por ejemplo si selecciono la fecha del 2020/11/01, debo ver los productos que aún no estén vencidos para esa fecha)</h5>
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
              <form method="POST">

              <div class="form-group">
                      <input type="date" name="fecha_dada" class="form-control" placeholder="Fecha a visualizar" autofocus>
                </div>
                  <input type="submit" class="btn btn-primary" name="no_vencidos" value="Ver productos no vencidos">
              </form>
          </div>
      </div>
      

<?php

if(isset($_POST['no_vencidos'])&&  $_POST['fecha_dada']!=""){
    $fecha = $_POST['fecha_dada'];
   ?>
   <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Id del farmaco</th>
            <th>Cantidad</th>
            <th>Fecha Ingreso</th>
            <th>Fecha Vencimiento</th>
          </tr>
        </thead>
        <tbody>
<!-- SHOWING LABS IN TABLE -->
            <?php
            
$query        = "SELECT * FROM ingreso WHERE fecha_vencimiento > $fecha";
$result_tasks = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result_tasks)) {
?>
               <tr>
                <td><?php echo $row['id_farmaco'];?></td>
                <td><?php echo $row['cantidad'];?></td>
                <td><?php echo $row['fecha_ingreso'];?></td>
                <td><?php echo $row['fecha_vencimiento'];?></td> 


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
}else{
    ?>
  
 <h5 class="text-danger"> <?php echo "Debe rellenar el campo de fecha, igualmente debe colocar una fecha";?></h5>
  <?php
}
?>






<?php
include("../includes/footer.php");
?>