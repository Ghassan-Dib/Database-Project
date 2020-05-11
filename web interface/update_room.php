<?php
  include_once 'dbh.inc.php';

    $number = $_POST['number'];
    $period = $_POST['cost'];
    $type = $_POST['type'];
    

    $query = mysqli_query($conn, "UPDATE ROOM SET cost = '$period', type = '$type' WHERE number = '$number';") or die(mysqli_error($conn));

header("Location: Rooms.php");
?>