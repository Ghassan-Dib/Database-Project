<?php
  include_once 'dbh.inc.php';

    $code = $_POST['idmedicine'];
    $name = $_POST['name'];
    $price = $_POST['cost'];
    

    $query = mysqli_query($conn, "INSERT INTO `medicine`VALUES('$code', '$name', '$price');") or die(mysqli_error($conn));

header("Location: Medicine.php");
?>