<?php
  include_once 'dbh.inc.php';

	$ID = $_POST['iddoctor'];
    $name = $_POST['dname'];
	$email = $_POST['demail'];
	$ex = $_POST['dextension'];
    $gender = $_POST['dgender'];
    $rank = $_POST['drank'];
    $salary = $_POST['dsalary'];
    $spec = $_POST['dspeciality'];
	$dep = $_POST['dep'];
    
    

    $query = mysqli_query($conn, "INSERT INTO doctor  VALUES('$ID', '$name', '$email', '$salary', '$gender', '$rank', '$ex', '$spec', '$dep');") or die(mysqli_error($conn));

header("Location: doctors.php");
?>