<?php
  include_once 'dbh.inc.php';
	
	$id = $_POST['idpatient'];
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $insurance = $_POST['Insurance'];
    $bt = $_POST['BloodType'];
    $gender = $_POST['Gender'];
    $birthdate = $_POST['BirthDate'];
    $address = $_POST['Address'];
	$arrivaldate = $_POST['ArrivalDate'];
	$status = $_POST['Status'];
    
    

    $query = mysqli_query($conn, "INSERT INTO patient VALUES('$id', '$fName', '$lName', '$insurance', '$status', '$bt', '$gender', '$birthdate', '$address', '$arrivaldate');") or die(mysqli_error($conn));

header("Location: Patients.php");
?>