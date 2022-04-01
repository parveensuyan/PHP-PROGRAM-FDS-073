<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign UP</title>
    <link rel="stylesheet" href="/form/index.css">

</head>
<body>
<?php include "function_index.php";?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <label for="username">User Name <span class = "error-msg" >*<span></label>
    <input type="text" class ="input-div-nn" id="username" name = "username"
     value = "<?= $username ?>"> 
    <p class = "error-msg"><?php echo $error_log['username'];?></p>
    <label for="pwd">Password<span class = "error-msg" >*</label>
    <input type="password" class ="input-div-nn" id="pwd" name="pwd"
    value = "<?= $pwd ?>">
     <p class = "error-msg"><?php echo $error_log['pwd'];?></p>
    <a href="login.php" class="href">Sign In</a> 
    <input type="submit" class="submit" value="Send Message">
</form>
</body>
</html>



<!-- 
 user portal
 username 
 user.          pwd
 admin          1234 
 admin          4567 ( username is already exist )


 Select * from user where username = "admin"
 fetch_row - 1
 user is error password incorrect!
 username should have 6 letters
 )
 password
 encypted
Security Level 1- front end side is prevent from
 SQL INJECTION ,CROSS SIDE SCRIPTIING, PLACING THE CODE, DO NOT ALLOW 
 ANYONE TO GET TO THE PATH FOR THE SPECIFIC FILE crack
Security 2 Backend  - Database encypt the password ,
use username and password for your db

once user login succesfully
Dashboard - Good Morning Admin.             Current Time
all records, Edit, Delete 
I AM GOING TO PING THE URL
 http://locahost/form/display.php without sign in 
it should not let us see what is inside this pagfe -  please login 
user needs authenticate first (LOGIN )

once user is login  - dashboard

http://locahost/form/index.php/
username --- x
session - login 

setup this session when the user login

check on evrypage user is login http://locahost/form/index.php/
session is created if not then we are going to go for login page

delete when user logout


destory the session after 30 min (Session expired!)
 -->

