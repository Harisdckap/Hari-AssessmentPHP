<?php
require_once("../models/UserModel.php");
// AuthorizationController 


class AuthorizationController
{
    public function signup()
    {
        $errors = [];
        // Handle signup form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = htmlspecialchars(trim($_POST['username']));
            $password = htmlspecialchars(trim($_POST['password']));

            // Validate input
            if (empty($username) || empty($password)) {
                $errors[] = "Username and password are required.";
            }

            if (strlen($password) < 6) {
                $errors[] = "Password must be at least 6 characters long.";
            }

            $userModel = new UserModel();
            if ($userModel->getUserByUsername($username)) {
                $errors[] = "Username already exists.";
            }
            //    check the error array empty
            if (empty($errors)) {
                $user = $userModel->createUser($username, $password);
                if ($user) {
                    // User created successfully, redirect to login page
                    header('Location: ../public/index.php?action=login');
                    exit();
                } else {
                    // Error occurred
                    $errors[] = "Error creating user.";
                }
            }
        }
        // Display signup form with errors
        include('../views/user/register.php');
    }
  
    // Login method to validate the user and admin or doctor
    public function login()
    {
        $errors = [];
        
        // Handle login form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = htmlspecialchars(trim($_POST['username']));
            $password = htmlspecialchars(trim($_POST['password']));
    
            // Validate input
            if (empty($username) || empty($password)) {
                $errors[] = "Username and password are required.";
            }

            // call the usermodel instance method to validate
            $userModel = new UserModel();
            $user = $userModel->getUserByUsername($username);
    
            if ($user) {
                if ($user['is_doctor'] == true) {
                    // Redirect to admin page if user is a doctor
                    header("location: ../adminviews/index.php");

                    exit();
                } else if (password_verify($password, $user['password'])) {
                    // Password verification passed, log in user
                    $_SESSION['id'] = $user['id']; // Store user ID in session
                    header('location: ../views/home/home.php');
                    exit();
                } else {
                    // Invalid password
                    $errors[] = "Invalid password.";
                }
            } else {
                // User not found
                $errors[] = "Invalid username.";
            }
        }
    
        // Display login form with errors
        include('../views/user/login.php');
    }
    
}
