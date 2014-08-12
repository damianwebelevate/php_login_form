<?php

/*
 Simple registration form
 * TODO VALIDATION HERE 
 */

class Register {

    public $connection;
    public $message;
    public $request;

    public function Register($host, $user, $password, $database) {
        //connect
        $this->connection = new mysqli($host, $user, $password, $database);
        //check connection
        if (mysqli_connect_errno()) {
            printf("Connection failed: %s\n", mysqli_connect_error());
            exit();
        }
        $this->insertDetails();
    }

    public function insertDetails() {
        $id = NULL;
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['firstPassword'];
        $request = "INSERT INTO authorised_users (id, 
            first_name, last_name, email, username, password) 
            VALUES ('NULL', 
            '".$first_name."',
            '".$last_name."',
            '".$email."',
            '".$username."',
            PASSWORD ('".$password."'));";
        
        $result = $this->connection->query($request);
        //echo $result;
        //echo $request;
            header('Location: index.php');
    }
}

?>

