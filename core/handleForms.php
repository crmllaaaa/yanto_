<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';  

if (isset($_POST['insertNewEmployeeBtn'])) {
	$firstName = trim($_POST['firstName']);
	$lastName = trim($_POST['lastName']);
	$gender = trim($_POST['gender']);
	$birthdate = trim($_POST['birthdate']);
	$contactNumber = trim($_POST['contactNumber']);
	$email = trim($_POST['email']);
	$profession = trim($_POST['profession']);

	if (!empty($firstName) && !empty($lastName) && !empty($gender) && !empty($birthdate) && !empty($contactNumber)  && !empty($email)  && !empty($profession)) {
			$query = insertIntoDreamJob($pdo, $firstName, $lastName, 
			$gender, $birthdate, $contactNumber, $email, $profession);

		if ($query) {
			header("Location: ../index.php");
		}

		else {
			echo "Insertion failed";
		}
	}

	else {
		echo "Make sure that no fields are empty";
	}
	
}


if (isset($_POST['editStudentBtn'])) {
	$employee_id = $_GET['employee_id'];
	$firstName = trim($_POST['firstName']);
	$lastName = trim($_POST['lastName']);
	$gender = trim($_POST['gender']);
	$birthdate = trim($_POST['birthdate']);
	$contactNumber= trim($_POST['contactNumber']);
	$email = trim($_POST['email']);
	$profession= trim($_POST['profession']);

	if (!empty($employee_id) && !empty($firstName) && !empty($lastName) && !empty($gender) && !empty($birthdate) && !empty($contactNumber) && !empty($email) && !empty($profession)) {

		$query = updateEmployee($pdo, $employee_id, $firstName, $lastName, $gender, $birthdate, $contactNumber, $email, $profession);

		if ($query) {
			header("Location: ../index.php");
		}
		else {
			echo "Update failed";
		}

	}

	else {
		echo "Make sure that no fields are empty";
	}

}





if (isset($_POST['deleteStudentBtn'])) {

	$query = deleteEmployee($pdo, $_GET['employee_id']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Deletion failed";
	}
}




?>