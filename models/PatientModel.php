<?php
// db requirements
require_once("../database/database.php");

class Patient {
    // properties declaration
    private $conn;
    private $table = 'patients';

    // Appointment properties
    public $id;
    public $name;
    public $reason;
    public $appointment_time;
    public $address;

    // call the intanse for db connection
    public function __construct() {
        $this->conn = DatabaseConnection::getInstance()->getConnection();
    }

    // Create an appointment
    public function create() {

        // Check if appointment time slot is available
        if ($this->isTimeSlotAvailable($this->appointment_time)) {

            // Time slot is available, proceed with insertion
            $query = 'INSERT INTO ' . $this->table . ' (name, reason, appointment_time, address) VALUES (:name, :reason, :appointment_time, :address)';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Bind data
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':reason', $this->reason);
            $stmt->bindParam(':appointment_time', $this->appointment_time);
            $stmt->bindParam(':address', $this->address);

            // Execute query
            if ($stmt->execute()) {
                return true; // Appointment created successfully
            } else {
                return false; // Failed to create appointment
            }
        } else {
            return false;
        }
    }

    // isTimeSlotAvaillable method
    private function isTimeSlotAvailable($appointment_time) {

        // checking if the time slot is available
        $query = 'SELECT id FROM ' . $this->table . ' WHERE appointment_time = :appointment_time';
        
        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind parameter
        $stmt->bindParam(':appointment_time', $appointment_time);

        // Execute query
        $stmt->execute();

        // Check  in stmt if row count is 1 in these time already booked by some person
        if ($stmt->rowCount() > 0) {
            return false; // Time slot already booked
        } else {
            return true; // Time slot available
        }
    }
}
?>
