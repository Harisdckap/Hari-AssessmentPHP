<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


// AdminController.php
require_once("../models/AdminModel.php");

class AdminController {
    private $admin;

    // call the instace of admin class
    public function __construct() {
        $this->admin = new Admin();
    }

    // Fetch all patients in search query 
    public function getAllPatients($searchQuery = '') {
        return $this->admin->getAllPatients($searchQuery);
    }

    // fetch all patients in table
    public function gettotalPatients() {
        return $this->admin->gettotalPatients();
    }

    // accept and confirmed the patient
    public function confirmPatient($patientId) {
        return $this->admin->confirmPatient($patientId);
    }

    // delete the patient
    public function deletePatient($patientId) {
        return $this->admin->deletePatient($patientId);
    }

    // fetch patients by page
    // public function getPatientsByPage($page, $patientsPerPage) {
    //     $offset = ($page - 1) * $patientsPerPage;
    //     return $this->admin->getPatientsByPage($offset, $patientsPerPage);
    // }
}

?>
