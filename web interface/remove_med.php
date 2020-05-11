<?php
  include_once 'dbh.inc.php';

     $code = $_POST['idmedicine'];

$query = mysqli_query($conn, "DELETE FROM `medicine` WHERE `medicine`.`idmedicine` = '$code';") or die(mysqli_error($conn));

header("Location: medicine.php");
    
    
?>