<!DOCTYPE html>
<html lang = "en">
    <head>
        <title> mask sales </title>
        <link rel = "stylesheet" type = "text/css" href = "register_page.css" />
        <script type = "text/javascript" src = "register_page.js"></script>
        <meta charset = "utf-8" />
    </head>
    <body> 
    <div id="registerPage" class="component">  
            <div class="cover">
            <div class="content">

            <div class="title"> 
            <h1> Register </h1> 
            </div>
            <div class="textTable"> 
            <form action="register_db.php" method="post"> 
                <table>  
                    <tr> 
                        <td> Username：</td> 
                        <td><input type="text" id="idusername" class="box" name="username" required="required"></td>  
                    </tr> 
                    <tr> 
                        <td> Real&nbsp;Name: </td> 
                        <td><input type="text" id="idrealName" class="box" name="realName" required="required" onchange="checkName()"></td>  
                    </tr> 
                    <tr> 
                        <td> Passport&nbsp;ID: </td> 
                        <td><input type="text" id="idpassportId" class="box" name="passportId" required="required"></td>  
                    </tr>
                    <tr> 
                        <td> Telephone&nbsp;Number: </td> 
                        <td><input type="text" id="idtelephoneNumber" class="box" name="telephoneNumber" required="required" onchange="checkPhone()"></td>  
                    </tr>
                    <tr> 
                        <td> region: </td> 
                        <td> 
                            <select class="box" name="regin">
                            <option value="China"> China </option>
                            <option value="America"> America </option>
                            <option value="UK"> UK </option>
                            <option value="Japan"> Japan </option>
                            <option value="Korea"> Korea </option>
                            <option value="Italy"> Italy </option>
                            <option value="Canada"> Canada </option>
                            </select>
                        </td>                  
                    </tr>
                    <tr> 
                        <td> Email: </td> 
                        <td><input type="email" id="idemail" class="box" name="email" required="required"></td>  
                    </tr>
                    <tr> 
                        <td> Password: </td> 
                        <td><input type="password" id="idpassword" class="box" name="password" required="required"></td>  
                    </tr>
                    <tr> 
                        <td> Repeat&nbsp;Password: </td> 
                        <td><input type="password" id="idrePassword" class="box" name="rePassword" required="required"></td>  
                    </tr> 
                </table> 
                <div class="prompt">
                    <?php
                        $err = isset($_GET["err"]) ? $_GET["err"] : "";
                        switch ($err) {
                            case 1:
                                echo "The username already exist.";
                                break;

                            case 2:
                                echo "The repeat password does not match the password";
                                break;

                            case 3:
                                echo "registered successfully";
                                break;
                        }
                    ?> 
                </div>
                <input type="submit" id="register" class="registerButton" name="register" value="register">
                <input type="reset" id="reset" class="resetButton" name="reset" value="reset"> 
                      
                <h4 class="foot"> if you have an account, please goto <a href="log_in_page.php">log in </a>to log in</h4> 
            </form> 
            </div> 
            </div>
            </div> 
        </div>
    </body>
</html>
