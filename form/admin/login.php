<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact us</title>
    <link rel="stylesheet" href="/form/index.css">
    </head>
    <body>
       <?php include "login_function.php";?>
        <div class="container">
            <div class="maindiv">
            <div class="col-6">

                <?php //echo $error_log['sucess'];?>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <label for="username">User Name <span class = "error-msg" >*<span></label>
                    <input type="text" class ="input-div-nn" id="username" name = "username"
                    value = "<?php echo $username; ?>">
             
                        <p class = "error-msg"><?php echo $error_log['username'];?></p>

                    <label for="pwd">Password<span class = "error-msg" >*</label>
                    <input type="password" class ="input-div-nn" id="pwd" name="pwd"
                    value = "<?php echo $pwd; ?>"                >
                    <p class = "error-msg"><?php echo $error_log['pwd'];?></p>
                    <a href="index.php" class="href">create an account</a>

                    <input type="submit" class="submit" value="Send Message">
                </form>
            </div>
            <div class="col-6"></div>
            </div>
        </div>
    </body>
    </html>