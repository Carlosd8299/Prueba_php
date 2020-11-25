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

      <!-- ADD FARMACO FORM -->
          <div class="card card-body">
              <form action="../save_farmaco.php" method="POST">
                <div class="form-group">
                    <input type="text" name="name_farmaco" class="form-control" placeholder="Nombre del farmaco" autofocus>
                </div>
                  <div class="form-group">
                      <input type="number" name="num_referencia_farmaco" class="form-control" placeholder="Numero unico de referencia farmaco" autofocus>
                  </div>
                  <div class="form-group">
                  <select name="select_lab_farmaco" class="form-control">
                    <?php
                      $consultarfarmaco ="SELECT * FROM laboratorio";
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
                  <input type="submit" class="btn btn-primary" name="save_farmaco" value="Guardar farmaco">
              </form>
          </div>
      </div>
      <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre del farmaco</th>
            <th>Numero de referencia</th>
            <th>Laboratorio</th>
          </tr>
        </thead>
        <tbody>
<!-- SHOWING LABS IN TABLE -->
            <?php
$query        = "SELECT * FROM farmaco";
$result_tasks = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result_tasks)) {
?>
               <tr>
                <td><?php
    echo $row['nombre'];
?></td>
<td><?php
    echo $row['num_referencia'];
?></td>
<td><?php
    echo $row['id_lab'];
?></td>
                <td>
                                       <a href="../delete_farmaco.php?id=<?php
    echo $row['Id'];
?>" class="btn btn-danger">
                    <i class="far fa-trash-alt"></i>
                    </a>
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
