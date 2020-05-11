<?php
  include_once 'dbh.inc.php';

     $ID = $_POST['iddoctor'];

$query = mysqli_query($conn, "DELETE FROM `doctor` WHERE `doctor`.`iddoctor` = '$ID';") or die(mysqli_error($conn));

header("Location: doctors.php");
    
    
?>