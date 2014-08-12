<?php

/*
 *This is the authorised users page specific to an authorised user 
 */

session_start();
if($_COOKIE['auth']){
    $display_block = "<p>Welcome to your home page</p>";
}else{
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div><?php echo $display_block;?></div>
    </body>
</html>