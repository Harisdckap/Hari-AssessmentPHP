<?php
require_once("../database/database.php");
class UserModel {
    private $pdo;

    public function __construct() {
        $db = DatabaseConnection::getInstance();
        $this->pdo = $db->getConnection();
    }

    // chceking the user is already in table
    public function getUserByUsername($username) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch();
    }

    // create the user and inserting
    public function createUser($username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $hashedPassword]);

        // Fetch the newly created user
        $userId = $this->pdo->lastInsertId();
        return $this->getUserById($userId);
    }

    // fetch single with userid
    public function getUserById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}

