<?php

// Confirm the pattient and update the databases confirmed.

require_once('../controllers/AdminController.php');
$controller = new AdminController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patientId = $_POST['patient_id'];
    $controller->confirmPatient($patientId);
    header("Location: AllpatientDetails.php");
    exit();
}

?>
