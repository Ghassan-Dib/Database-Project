<?php
  include_once 'dbh.inc.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $manager = $_POST['manager'];
    $salary = $_POST['salary'];
    
    

    $query = mysqli_query($conn, "INSERT INTO clinicalassistant VALUES('$id', '$name', '$manager', '$salary');") or die(mysqli_error($conn));

header("Location: Employees.php");
?>