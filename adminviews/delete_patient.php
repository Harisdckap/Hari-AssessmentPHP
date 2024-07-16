<?php
// delete patient from database

require_once('../controllers/AdminController.php');
$controller = new AdminController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patientId = $_POST['patient_id'];
    $controller->deletePatient($patientId);
    header("Location: AllpatientDetails.php");
    exit();
}