<?php
  include_once 'dbh.inc.php';

    $name = $_POST['name'];
    $head = $_POST['head'];
    $loc = $_POST['location'];
    $ex = $_POST['extension'];
    
    

    $query = mysqli_query($conn, "INSERT INTO department VALUES('$name', '$ex', '$head', '$loc');") or die(mysqli_error($conn));

header("Location: departments.php");
?>