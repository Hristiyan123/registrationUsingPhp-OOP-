<?php

class Signup extends Dbh {
    private $username;
    private $pwd;
    private $email;

    public function __construct($username, $pwd, $email) {
        $this->username = $username;
        $this->pwd = $pwd;
        $this->email = $email;
    }

    private function insertUser() {
        try {
            $query = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email);";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":username", $this->username);
            $stmt->bindParam(":pwd", $this->pwd);
            $stmt->bindParam(":email", $this->email);
            $stmt->execute();
            return true;
        } catch (\Throwable $th) {
            return false; 
        }
    }

    private function emptySubmit() {
        if(isset($this->username) && isset($this->pwd) && isset($this->email)) {
            return false;
        } else {
            return true;
        }
    }

    public function createUser() {
        if ($this->emptySubmit()) {
            header("location: " . $_SERVER['DOCUMENT_ROOT'] . '/index.php');
            die();
        }

        if ($this->insertUser()) {
            header("location: " . $_SERVER['DOCUMENT_ROOT'] . '/success.php');
            die();
        } else {
            die("Failed to create user.");
        }
    }
}
?>
