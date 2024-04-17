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

    private function insertUser($hashed_password) {
        try {
            $query = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email);";
            $stmt = parent::connect()->prepare($query);
            $stmt->bindParam(":username", $this->username);
            $stmt->bindParam(":pwd", $hashed_password); // Insert hashed password
            $stmt->bindParam(":email", $this->email);
            $stmt->execute();
            return true;
        } catch (\Throwable $th) {
            return false; 
        }
    }

    private function isEmptySubmit() {
        if(isset($this->username) || isset($this->pwd) || isset($this->email)){
            return false;
        } else {
            return true;
        }
    }

    public function signupUser(){
        //Error
        if($this->isEmptySubmit()) {
            header("Location: index.php");
            die();
        }

        // No errors, hash the password
        $options = [
            'cost' => 12
        ];
        $hashed_password = password_hash($this->pwd, PASSWORD_DEFAULT, $options);

        // Insert user into the database
        $this->insertUser($hashed_password);
    }
}
