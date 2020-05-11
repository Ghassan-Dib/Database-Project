<?php
  include_once 'dbh.inc.php';

     $ID = $_POST['idnurse'];

$query = mysqli_query($conn, "DELETE FROM `nurse` WHERE `nurse`.`idnurse` = '$ID';") or die(mysqli_error($conn));

header("Location: Nurses.php");
    
    
?>