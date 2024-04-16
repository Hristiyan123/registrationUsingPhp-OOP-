<?php

class Dbh {
    private $host = "localhost";
    private $dbname = "register.using.php(oop)";
    private $dbusername = "root";
    private $dbpassword = "";

    protected function connect() {
        try {
            $pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->dbusername, $this->dbpassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
        } catch (PDOException $e) {
            error_log("Database connection failed: " . $e->getMessage(), 0); 
            echo "Database connection failed. Please try again later.";
        }
    }
}

?>
