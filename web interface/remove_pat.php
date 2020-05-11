<?php
  include_once 'dbh.inc.php';

     $ID = $_POST['idpatient'];

$query = mysqli_query($conn, "DELETE FROM `patient` WHERE `patient`.`idpatient` = '$ID';") or die(mysqli_error($conn));

header("Location: Patients.php");
    
    
?>