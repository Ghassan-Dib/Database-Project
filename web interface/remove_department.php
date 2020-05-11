<?php
  include_once 'dbh.inc.php';

     $name = $_POST['name'];

$query = mysqli_query($conn, "DELETE FROM `department` WHERE `department`.`name` = '$name';") or die(mysqli_error($conn));

header("Location: departments.php");   
    
?>