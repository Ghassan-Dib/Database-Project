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
    

    $query = mysqli_query($conn, "UPDATE NURSE SET dep = '$dep', nname = '$name', nemail = '$email', nsalary = '$salary', nbirthdate = '$birth', `nrank` = '$rank', ngender = '$gender' WHERE idnurse = '$ID';") or die(mysqli_error($conn));

header("Location: Nurses.php");
?>