<?php

include("db.php");

if(isset($_POST['save_ing'])){
    $id_farmaco = $_POST['select_farmaco_ingreso'];
    $cantidad= $_POST['cantidad_ingreso'];
    $fecha_vencimiento=$_POST['fecha_vencimiento_ingreso'];
    $query = "INSERT INTO ingreso(id_farmaco, cantidad, fecha_vencimiento) VALUES ('$id_farmaco','$cantidad','$fecha_vencimiento')";
    $resultado= mysqli_query($conn, $query);

    if(!$resultado){
    die ("No se guardo");
    echo"no se guardo";
    }else{
        header("Location: view/ingreso.php");
    }
    
    $_SESSION['message'] = 'Ingreso Guardado satisfactoriamente';
    $_SESSION['message_type'] = 'success';

}
?>