<?php

/*
 * 
 * A Class that opens a connection to a Database, defining a host user 
 * password and database.
 * This class is big.  I wanted to check two values against those that were in the
 * database. Each return different errors based on input.
 *
 */

class Connect {

    public $connection;
    public $request;
    public $counter;
    public $message;
    public $isValidPassword;
    public $isValidUser;
    public $error;
    public $isValid;

    public function Connect($host, $user, $password, $database) {
        //connect
        $this->connection = new mysqli($host, $user, $password, $database);
        //check connection
        if (mysqli_connect_errno()) {
            printf("Connection failed: %s\n", mysqli_connect_error());
            exit();
        }
        $this->checkPassword();
        $this->checkUserName();
        $this->countAttempts();
        $this->checkDetails();
        $this->useCounter();
    }

    //check User Name
    public function checkUserName() {
        $username = $_POST['username'];
        $this->request = "SELECT * FROM `authorised_users` WHERE username = \"$username\"";
        $result = $this->connection->query($this->request);
        $row_count = $result->num_rows;
        if ($row_count == 1) {
            return $this->isValidUser = TRUE;
        } else {
            return $this->isValidUser = FALSE;
        }
    }

    //check User Password
    public function checkPassword() {
        $password = $_POST['password'];
        $this->request = "SELECT * FROM `authorised_users` WHERE password = PASSWORD(\"$password\")";
        $result = $this->connection->query($this->request);
        $row_count = $result->num_rows;
        if ($row_count == 1) {
            return $this->isValidPassword = TRUE;
        } else {
            return $this->isValidPassword = FALSE;
        }
    }

    //if both user name and password are true then continue to logged in
    public function checkDetails() {
        //is valid
        if ($this->isValidPassword AND $this->isValidUser) {
            header('Location: home.html');
            setcookie('auth', '1', time() + 3600, '/', '', 0);
            //user name does not match
        } elseif ($this->isValidPassword AND !$this->isValidUser) {
            return $this->message = "<p>Username does not match our records</p>";
            header('Location: index.php');
            //password does not match
        } elseif (!$this->isValidPassword AND $this->isValidUser) {
            return $this->message = "<p>Password is incorrect<p><a href=\"submitEmail.php\">Forgot Password</a></p>";
            //setcookie('forgot', '1', time() + 3600, '/', '', 0);

            //details do not match 
        } else {
            return $this->message = "<p>Details not registered</p><p><a href=\"registerForm.php\">Register Details</a></p>";
            header('Location: index.php');
        }
    }

    //set a counter using a counter to see how many times a user tries to log in
    public function setCounter() {
        $this->counter = 0;
    }

    //set an error messagge
    public function setError() {
        $this->error = "";
    }

    public function countAttempts() {
        $this->counter = (isset($_POST['counter'])) ? $_POST['counter'] + 1 : 1;
        return $this->counter;
    }

    //set a message to return to the user
    public function setMessage() {
        $this->message = "";
    }

    public function useCounter() {
        switch ($this->counter) {
            case 1: $this->counter = 1;
                return $this->error = "";
                break;
            case 2: $this->counter = 2;
                return $this->error = "<p style=\"color:blue\">you have three remaining log in attempts</p>";
                break;
            case 3: $this->counter = 3;
                return $this->error = "<p style=\"color:red\">you have TWO remaining log in attempts</p>";
                break;
            case 4: $this->counter = 4;
                return $this->error = "<p style=\"color: red; font-weight: bold;\">you have ONE remaining log in attempts</p>";
                break;
            case 5: $this->counter = 5;
                header('Location: 404.html');
                break;
            default:
            //empty
        }
    }

}

?>
