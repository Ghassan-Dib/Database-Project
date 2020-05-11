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
    

    $query = mysqli_query($conn, "UPDATE DOCTOR SET drank = '$rank',  dname = '$name', demail = '$email', dsalary = '$salary', dspeciality = '$spec', dextension = '$ex', `dgender` = '$gender',  `dep` = '$dep' WHERE iddoctor = '$ID';") or die(mysqli_error($conn));

header("Location: doctors.php");
?>