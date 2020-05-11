<?php
  include_once 'dbh.inc.php';

     $number = $_POST['number'];

$query = mysqli_query($conn, "DELETE FROM `room` WHERE `room`.`number` = '$number';") or die(mysqli_error($conn));

header("Location: Rooms.php");
    
    
?>