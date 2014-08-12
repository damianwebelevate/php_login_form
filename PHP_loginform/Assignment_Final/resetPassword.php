<?php

/*Almost all of the classes have the same constructor this is done
 * on purpose.  I tried to have a "master class" for the database connection
 * however this did not work and could in the future revise this program to include
 * javascript validation and increased security features.
 * Reset Password feature
 */

class ResetPassword{
    
    public $message;
    public $isSameLen;
    public $isSamePass;
    public $request;
    public $connection;
    public $result;
    
     public function ResetPassword($host, $user, $password, $database) {
        //connect
        $this->connection = new mysqli($host, $user, $password, $database);
        //check connection
        if (mysqli_connect_errno()) {
            printf("Connection failed: %s\n", mysqli_connect_error());
            exit();
        }
        $this->passwordsMatch();
        $this->checkPasswordLenght();
        //$this->changePassword();
    }
    
    public function checkPasswordLenght(){
        $pass1 = $_POST['firstPassword'];
        $pass2 = $_POST['secondPassword'];
        
        if(strlen($pass1) == strlen($pass2)){
            return $this->isSameLen = TRUE;
        }else{
            return $this->message = "Passwords are not the same lenght";
        }
        
    }
        //check the lenght of the password
    public function passwordsMatch(){
        $pass1 = $_POST['firstPassword'];
        $pass2 = $_POST['secondPassword'];
        if($this->isSameLen){
            if($pass1 == $pass2){
                return $this->isSamePass = TRUE;
            }else{
                return $this->message =  "Password characters do not match";
            }
        }
    }


    public function changePassword(){
        
        $emailAdd = $_SESSION['email'];
        $this->request = "SELECT * FROM `authorised_users` WHERE email = \"$emailAdd\"";
        $result = $this->connection->query($this->request);
        while ($row = mysqli_fetch_array($result)) {
            //$id = $row['id'];
            //$first = $row['first_name'];
            //$last = $row['last_name'];
            $email = $row['email'];
            //$user = $row['username'];
            //$password = $row['password'];
        }
        //echo $first, $last, $email, $user, $password;
        //echo "<br />";
        //echo session_id();
        
        $pass = $_POST['firstPassword'];
        if($this->isSamePass){
        $this->request = "UPDATE `authorised_users` SET `password`= PASSWORD(\"$pass\") WHERE `email` = \"$email\"";
        $result = $this->connection->query($this->request);
           header('Location: index.php');   
        }
    }
 
    
    

    public function setMessage(){
        $this->message = "";
    }
    
}//end of class


?>
