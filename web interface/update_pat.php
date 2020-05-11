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
    

    $query = mysqli_query($conn, "UPDATE patient SET fName = '$fName', lName = '$lName', Insurance = '$insurance', Status = '$status', BloodType = '$bt', Gender = '$gender', BirthDate = '$birthdate', ArrivalDate = '$arrivaldate', Status = '$status' WHERE idpatient = '$id';") or die(mysqli_error($conn));

header("Location: Patients.php");
?>