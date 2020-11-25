<?php

include("db.php");

if(isset($_POST['save_lab'])){
    $nombre_lab = $_POST['name_lab'];

    $query = "INSERT INTO laboratorio(nombre) VALUES ('$nombre_lab')";
    $resultado= mysqli_query($conn, $query);

    if(!$resultado){
die ("No se guardo");
    }else{
        header("Location: index.php");
    }
    
    $_SESSION['message'] = 'Laboratorio Guardado satisfactoriamente';
    $_SESSION['message_type'] = 'success';

}
?>