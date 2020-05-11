<?php
  include_once 'dbh.inc.php';

    $number = $_POST['number'];
    $period = $_POST['cost'];
    $type = $_POST['type'];
    

    $query = mysqli_query($conn, "INSERT INTO room VALUES('$number', '$period', '$type');") or die(mysqli_error($conn));

header("Location: Rooms.php");
?>