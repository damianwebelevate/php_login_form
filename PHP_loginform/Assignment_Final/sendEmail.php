<?php

/*
 * class to check the email address
 * Sending email won't work; as yet too much config to do so have a redirect if successful
 * tried to do this page, downloaded software and used a class called phpmailer from
 * git hub no real sence as its going to be run on college computers
 * link: https://github.com/Synchro/PHPMailer
 * also something about microsoft not liking the mail() function
 * if mail() is valid or "sent" header re-direct on this page
 */

class SendAnEmail {

    public $isValidEmail;
    public $connection;
    public $email;

    public function SendAnEmail($host, $user, $password, $database) {
        //connect
        $this->connection = new mysqli($host, $user, $password, $database);
        //check connection
        if (mysqli_connect_errno()) {
            printf("Connection failed: %s\n", mysqli_connect_error());
            exit();
        }
        $this->checkEmail();
    }

    public function checkEmail() {
        $email = $_POST['email'];
        $this->request = "SELECT * FROM `authorised_users` WHERE `email` = \"$email\"";
        $result = $this->connection->query($this->request);
        $row_count = $result->num_rows;
        if ($row_count == 1) {
            $message = "To re-set your password please follow the link below: \n";
            $message .= "$email \n";
            $message .= "Follow the link to reset password";
            $message .= "http://localhost/Assignment_Final/resetDetails.php \n";
            $to = "$email";
            $subject = "Reset your Password";
            $additional_headers = "MIME-Version: 1.0\r\n";
            $additional_headers.= "Content-type: text/html; charset=ISO-8850-1\r\n";
            $additional_headers .= "From: My Web Site <somewhere@domain.com> \n";
            $additional_headers .= "Reply-To: " . $email;
            if (@mail($to, $subject, $message, $additional_headers)) {
               header('Location: resetDetails.php');
               
            }
            //move these later cause this still works on a later page
            session_start();
            $_SESSION[email] = $email;
            
        }else{
            header('Location: 404.html');
        }
    }

}

$send = new SendAnEmail("localhost", "root", "", "application");
$send->checkEmail();

?>
