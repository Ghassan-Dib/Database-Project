<?php
  include_once 'dbh.inc.php';

	$ID = $_POST['idnurse'];
    $name = $_POST['nname'];
    $email = $_POST['nemail'];
    $salary = $_POST['nsalary'];
    $birth = $_POST['nbirthdate'];
    $gender = $_POST['ngender'];
    $rank = $_POST['nrank'];
	$dep = $_POST['dep'];
    

    $query = mysqli_query($conn, "INSERT INTO nurse VALUES('$ID', '$name', '$email', '$salary', '$birth', '$gender', '$rank', '$dep');") or die(mysqli_error($conn));

header("Location: Nurses.php");
?>