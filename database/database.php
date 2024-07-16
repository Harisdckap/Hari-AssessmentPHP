<?php
// Database Class 
class DatabaseConnection{
    // creating a instance
     public static $instance= null;
     private $pdo;
  
     // private constructor 
     public function __construct(){
        require('../database/config.php');
        $host=HOST;
        $dbname=DATABASE;
        $username=USERNAME;
        $password=PASSWORD;

        try{
            $this->pdo=new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        }catch(PDOException $e){
            die('Connection failed: '. $e->getMessage());
        }
     }

     // Singleton method to create instance of DatabaseConnection class
     public static function getInstance(){
         if(self::$instance==null){
            self::$instance=new DatabaseConnection();
         }
         return self::$instance;
     }


    //  getConnection method
     public function getConnection(){
         return $this->pdo;
     }
}
?>