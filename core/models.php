<?php 

require_once 'dbConfig.php';

function insertIntoDreamJob($pdo,$first_name, $last_name, $gender, $birthdate, $contact_number, $email, $profession) {

	$sql = "INSERT INTO dream_job (first_name,last_name,gender,birthdate,contact_number,email,profession) VALUES (?,?,?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$first_name, $last_name, $gender, $birthdate, 
		$contact_number, $email, $profession]);

	if ($executeQuery) {
		return true;	
	}
}

function seeAllDreamJob($pdo) {
	$sql = "SELECT * FROM dream_job";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getEmployeeByID($pdo, $employee_id) {
	$sql = "SELECT * FROM dream_job WHERE employee_id = ?";
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute([$employee_id])) {
		return $stmt->fetch();
	}
}

function updateEmployee($pdo, $employee_id, $first_name, $last_name, 
	$gender, $birthdate, $contact_number, $email, $profession) {

	$sql = "UPDATE dream_job 
				SET first_name = ?, 
					last_name = ?, 
					gender = ?, 
					birthdate = ?, 
					contact_number = ?, 
					email = ?, 
					profession = ? 
			WHERE employee_id = ?";
	$stmt = $pdo->prepare($sql);
	
	$executeQuery = $stmt->execute([$first_name, $last_name, $gender, 
		$birthdate, $contact_number, $email, $profession, $employee_id]);

	if ($executeQuery) {
		return true;
	}
}



function deleteEmployee($pdo, $employee_id) {

	$sql = "DELETE FROM dream_job WHERE employee_id = ?";
	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$employee_id]);

	if ($executeQuery) {
		return true;
	}

}




?>