<?php

/*
 * reset Password
 * this should be set to the user that logs in. What I have discovered
 * is that a users session SID stores lots of information about the user.
 * As I am testing the reset password works however every hour due to the cookie
 * If i have used two users details then both passwords get changed.
 * Certain this has to do with session variables.
 * Also use s cooke called forgot to show the page
 *
 */
if($_COOKIE['forgot']){
    $display_block = "<p>Please Enter Your Details:</p>";
}else{
    header('Location: index.php');
}

session_start();
$message = "";

if(empty($_POST['firstPassword']) || empty($_POST['secondPassword'])){
        //echo displays twice
}else{
    include 'resetPassword.php';
    $reset = new ResetPassword("localhost", "root", "", "application");
    $reset->passwordsMatch();
    $reset->checkPasswordLenght();
    $reset->changePassword();
    $message = $reset->message;    
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Reset Password</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/myStyle.css" type="text/css">
    </head>
    <body>
        <?php echo $display_block;?>  
        <hr />
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <br />
            Password: 
            <br />
            <input type="password" id="firstPassword" name="firstPassword" autocomplete="off" value="" autofocus />
            <br />
            Re-type Password:
            <br />
            <input type="password" id="secondPassword" name="secondPassword" autocomplete="off" value="" />
            <br />
            <input type="submit" value="Submit" />
        </form>
        <legend><?php echo $message;?></legend>
    </body>
</html>
