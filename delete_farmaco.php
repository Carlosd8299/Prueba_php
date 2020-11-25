<?php

include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM farmaco WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Farmaco eliminado';
  $_SESSION['message_type'] = 'danger';
  header('Location: view/farmaco.php');
}

?>