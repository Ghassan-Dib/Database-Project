<?php
  include_once 'dbh.inc.php';

    $name = $_POST['name'];
    $head = $_POST['head'];
    $loc = $_POST['location'];
    $ex = $_POST['extension'];
    
    
 $query = mysqli_query($conn, "UPDATE department SET head = '$head', location = '$loc', extension = $ex WHERE name = '$name';") or die(mysqli_error($conn));

header("Location: departments.php");
?>