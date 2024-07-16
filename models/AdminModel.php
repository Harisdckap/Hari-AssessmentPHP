<?php

// AdminModel.php

require_once("../database/database.php");

// AdminModel Class
class Admin {
   
    private $conn;
    private $table = 'patients';

    public function __construct() {
        $this->conn = DatabaseConnection::getInstance()->getConnection();
    }

    // get all pattients from database
    public function getAllPatients($searchQuery = '') {
        $query = "SELECT * FROM $this->table";
        if ($searchQuery) {
            $query .= " WHERE name LIKE :search OR reason LIKE :search";
        }
        $stmt = $this->conn->prepare($query);

        if ($searchQuery) {
            $searchTerm = '%' . $searchQuery . '%';
            $stmt->bindParam(':search', $searchTerm);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ); 
    }

    // delete patient method
    public function deletePatient($patientId) {
        $deleteQuery = $this->conn->prepare("DELETE FROM patients WHERE id = :id");
        return $deleteQuery->execute(['id' => $patientId]);
    }

    // Confirmpatient method
    public function confirmPatient($patientId) {
        $updateQuery = $this->conn->prepare("UPDATE patients SET confirmed = 1 WHERE id = :id");
        return $updateQuery->execute(['id' => $patientId]);
    }

    // get total number of patients method
    public function gettotalPatients() {
        $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM $this->table");
        $stmt->execute();
        return $stmt->fetch()['total'];
    }

    // get patients by page method
    // public function getPatientsByPage($offset, $patientsPerPage) {
    //     $stmt = $this->conn->prepare("SELECT * FROM $this->table LIMIT $patientsPerPage OFFSET $offset");
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_OBJ);
    // }
    
}

