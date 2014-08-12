<!-- On this page is just a form which takes input at present no validation
for this page-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/myStyle.css" type="text/css">
        <title>Registration Form</title>
    </head>
    <body>
        <?php
        /*Simple Registration form
         * 
         */
        session_start();
        $message = "";
        $error = "";
        if (empty($_POST['first_name']) || empty($_POST['last_name']) 
            || empty($_POST['email']) || empty($_POST['username']) 
            || empty($_POST['firstPassword']) || empty($_POST['secondPassword'])) {
            echo "<p>Please enter your details:</p>";
        } else {
            include 'Register.php';
            $register = new Register("localhost", "root", "", "application");
            $register->insertDetails();
            $message = $register->message;
            //$error = $login->error;
        }
        if(isset($_POST['Submit'])){
             setcookie('newUser', '1', time() + 3600, '/', '', 0);
        }
        ?>

        <hr />
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            First Name:
            <br />
            <input type="text" id="first_name" name="first_name" autocomplete="off" value="" required autofocus />
            <br />
            Last Name:
            <br />
            <input type="text" id="last_name" name="last_name" autocomplete="off" value="" required />
            <br />
            Email Address:
            <br />
            <input type="email" id="email_address" name="email" autocomplete="off" value="" required />
            <br />
            User Name:
            <br />
            <input type="text" id="username" name="username" autocomplete="off" value="" required  />
            <br />
            Password:
            <br />
            <input type="password" id="password" name="firstPassword" autocomplete="off" value="" required />
            <br />
            Re-type Password:
            <br />
            <input type="password" id="password" name="secondPassword" autocomplete="off" value="" required />
            <br />
            <input type="submit" name="Submit" value="Log-In" />
        </form>
            <legend><?php echo $message; ?></legend>
            <legend><?php echo $error; ?></legend>
    </body>
</html>