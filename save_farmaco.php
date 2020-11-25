<?php

include("db.php");

if(isset($_POST['save_farmaco'])){
    $nombre = $_POST['name_farmaco'];
    $num_referencia= $_POST['num_referencia_farmaco'];
    $id_lab=$_POST['select_lab_farmaco'];
    $query = "INSERT INTO farmaco(num_referencia, nombre, id_lab) VALUES ('$num_referencia','$nombre','$id_lab')";
    $resultado= mysqli_query($conn, $query);

    if(!$resultado){
    die ("No se guardo");
    echo"no se guardo";
    }else{
        header("Location: view/farmaco.php");
    }
    
    $_SESSION['message'] = 'Farmaco Guardado satisfactoriamente';
    $_SESSION['message_type'] = 'success';

}
?>