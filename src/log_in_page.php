<!DOCTYPE html>
<html lang = "en">
    <head>
        <title> mask sales </title>
        <link rel="stylesheet" type="text/css" href="log_in_page.css" />
        <meta charset = "utf-8" />
    </head>
    <body> 
    <div id="loginPage" class="component" >
        <span class="bigTitle">Welcome to Mask Sale Website</span>
        <div class="cover">
        <div class="content">
        
        <div class="title">
        <h1>Log&nbsp;in</h1> 
        </div>
        <div class="textTable">
        <form action="login_db.php" method="post"> 
            <table> 
                <tr> 
                    <td>Username：</td> 
                    <td><input type="text" id="idusername" class="box" name="username" required="required" value="<?php echo isset($_COOKIE[""]) ? $_COOKIE[""] : ""; ?>"></td> 
                </tr> 
                <tr> 
                    <td>Password：</td> 
                    <td><input type="password" id="idpassword" class="box" name="password" required="required"></td> 
                </tr> 
            </table> 
            <div class="prompt">
                <?php
                    $err = isset($_GET["err"]) ? $_GET["err"] : "";
                    switch ($err) {
                        case 1:
                            echo "Username or password error";
                            break;

                        case 2:
                            echo "the Username or password cannot be empty";
                            break;
                    } 
                ?> 
            </div>
            
            <input type="submit" id="login" class="loginButton" name="login" value="log in">
            <input type="reset" id="reset" class="resetButton" name="reset" value="reset"> 
                    
            <h4 class="foot">did not have account, please goto <a href="register_page.php">register </a>to have an account</h4>
        </form> 
        </div>
        </div>
        </div> 
        </div> 
    </body>
</html>     
