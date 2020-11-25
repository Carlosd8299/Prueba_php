<?php  
session_start();

$conn=mysqli_connect(
    'localhost',
    'root',
    '',
    'bd_farmacia'
)or die(mysqli_erro($mysqli));


?>