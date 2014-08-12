<?php

/*
 * forgot password
 * posts to a simple class that checks the email address against the records 
 * in the database if there the email gets sent whereby the idea is that the user 
 * gets sent to a change password form
 */

session_start();
if(empty($_POST['useremail'])){
    echo '<p>Required Information*</p>';
}else{
    include 'sendEmail.php';  
}
$display_block = "<p>Please enter your email address</p>"
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/myStyle.css" type="text/css">
    </head>
    <body>
        <?php echo $display_block;?>
        <hr />
        <div id="mydiv">
        <form action="sendEmail.php" method="post">
            <br />
            Email Address: 
            <br />
            <input type="email" id="email" name="email" autocomplete="off" value="" autofocus required />
            <br />
            <input type="submit" value="Submit" />
        </form>
      </div>
    </body>
</html>