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

      <!-- ADD LAB FORM -->
          <div class="card card-body">
              <form action="../save_lab.php" method="POST">
                  <div class="form-group">
                      <input type="text" name="name_lab" class="form-control" placeholder="Nombre del laboratorio" autofocus>
                  </div>
                  <input type="submit" class="btn btn-primary" name="save_lab" value="Guardar Laboratprio">
              </form>
          </div>
      </div>
      <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre del laboratorio</th>
          </tr>
        </thead>
        <tbody>
<!-- SHOWING LABS IN TABLE -->
            <?php
$query        = "SELECT * FROM laboratorio";
$result_tasks = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result_tasks)) {
?>
               <tr>
                <td><?php
    echo $row['nombre'];
?></td>
                <td>
                    
                    <a href="delete_lab.php?id=<?php
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
