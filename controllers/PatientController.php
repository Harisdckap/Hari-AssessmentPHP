<?php
session_start();

// Include database and model files
include_once '../models/PatientModel.php';

// PatientController
class PatientController {
    private $patient;

    public function __construct() {
        // call the instance Patient object
        $this->patient = new Patient();
    }

    // bookingAppointment methdod for the patient
    public function bookAppointment() {
        // Check if form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Set patient properties && validating and santizeing the inputs
            $this->patient->name = htmlspecialchars(strip_tags($_POST['name']));
            $this->patient->reason = htmlspecialchars(strip_tags($_POST['reason']));
            $this->patient->appointment_time = htmlspecialchars(strip_tags($_POST['appointment_time']));
            $this->patient->address = htmlspecialchars(strip_tags($_POST['address']));

            // Create patient
            if ($this->patient->create()) {
                // Set success message in session
                $_SESSION['message'] = 'Appointment booked successfully.';
                $_SESSION['message_type'] = 'success';
                header('location: ../views/home/home.php');
            } else {
                // Set error message in session
                $_SESSION['message'] = 'Appointment could not be booked.';
                $_SESSION['message_type'] = 'error';
            }

            // include the patientDetails form element for users to see
            include('../views/user/patientDetails.php');
        }
    }

    
}


?>

