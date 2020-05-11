<?php
  include_once 'dbh.inc.php';

     $ID = $_POST['id'];

$query = mysqli_query($conn, "DELETE FROM `clinicalassistant` WHERE `clinicalassistant`.`id` = '$ID';") or die(mysqli_error($conn));

header("Location: Employees.php");
    
    
?>