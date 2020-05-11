<?php
  include_once 'dbh.inc.php';

    $code = $_POST['idmedicine'];
    $name = $_POST['name'];
    $price = $_POST['cost'];
    

    $query = mysqli_query($conn, "UPDATE MEDICINE SET name = '$name', cost = '$price' WHERE idmedicine = $code;") or die(mysqli_error($conn));

header("Location: Medicine.php");
?>