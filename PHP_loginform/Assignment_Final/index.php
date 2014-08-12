<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/myStyle.css" type="text/css">
        <title>Log In Form</title>
    </head>
    <body>
        <?php
        /*In the legend the first one as test I output a counter
         * to see it just put . $counter after $message . <br />
         * This is my access page.  The form posts to itself until
         * conditions are met in the Database.php file.
         * On this page is a counter which determines the amount of 
         * times a user tries to acess the site.  Could use a getENV and 
         * target users IP and counter variable to determine if site is 
         * being attacked by denial of service and deny all from said ip
         */
        
        session_start();
        $message = "";
        $error = "";
        $display_block = "<p>Please Enter Your Details:</p>";
        //$counter = 0;
        if (empty($_POST['username']) || empty($_POST['password'])) {
          //bit of logic
        } else {
            include 'Database.php';
            $login = new Connect("localhost", "root", "", "application");
            $message = $login->message;
            $counter = $login->counter;
            $error = $login->error;
        }
        if(isset($_POST['Submit'])){
            //setting this here as i have discovered that the setcookie
            //at a later stage does not get stored as in I have to skip two pages
            //so short cut set cookie here;
             setcookie('forgot', '0', time() + 3600, '/', '', 0);
        }
        ?>
            <?php echo $display_block;?>
             <hr />
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <br />
            User Name:
            <br />
            <input type="text" id="username" name="username" autocomplete="off" value="" required autofocus  />
            <br />
            Password:
            <br />
            <input type="password" id="password" name="password" autocomplete="off" value="" required />
            <br />
            <input type="submit" name="Submit" value="Log-In" />
            <input type="hidden" name="counter" value="<?php echo $counter; ?>"/>
            <br />
        </form>
            <legend><?php echo $message ; ?></legend>
            <legend><?php echo $error; ?></legend>
  </body>
</html>