<!DOCTYPE html>
<html lang = "en">
    <head>
        <title> mask sales </title>
        <link rel = "stylesheet" type = "text/css" href = "administrator_page.css">
        <meta charset = "utf-8" />
    </head>
    <body> 
        <div id="administratorPage" class="component" >
        <span class="bigTitle"> Create manager </span>
            <form action="administrator_manager_db.php" method="post"> 
                <span class="warn"> only the last version of manager information will be accepted </span>
                <table class="show">  
                <tr> 
                        <td> Username </td> 
                        <td> Real Name </td>
                        <td> Password </td>
                        <td> emplyee ID </td>
                        <td> Telephone Number </td>
                        <td> email address </td>  
                    </tr> 
                    <tr> 
                        <td><input type="text" id="idusername" name="username" required="required"></td> 
                        <td><input type="text" id="idrealName" name="realName" required="required"></td>  
                        <td><input type="password" id="idpassword" name="password" required="required"></td>  
                        <td><input type="text" id="idemployeeID" name="employeeID" required="required"></td> 
                        <td><input type="text" id="idtelephoneNumber" name="telephoneNumber" required="required"></td>  
                        <td><input type="email" id="idemail" name="email" required="required"></td>  
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
                                    echo "create successfully";
                                    break;
                                
                                case 3:
                                    echo "update successfully";
                                    break;
                            }
                        ?> 
                    </div>
                    <input type="submit" id="ok" class="okButton" name="ok" value="ok">
                    <input type="reset" id="reset" class="resetButton" name="reset" value="reset">
                 
                    <span class="turn">please click  <a href="administrator_page2.php">here </a>to create sales account too!</span>
            </form>   
            
            <?php
                $conn = mysqli_connect("localhost", "shyxt1", "tangxinran", "shyxt1"); 
                if (!$conn) {
                    die('Could not connect: ' . mysqli_error($conn));
                }

                $sql="SELECT * FROM manager";
                $result = mysqli_query($conn,$sql);

                echo "<table class=\"list\">";
                echo "<tr><th>username</th>" . " <th>realName</th>" . "<th>employeeID</th>" . "<th>telephoneNumber</th>" . "<th>email</th>" . "</tr>";
                while($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo  "<td>" . $row['username'] . "</td>";
                    echo  "<td>" . $row['realName'] . "</td>";
                    echo  "<td>" . $row['employeeID'] . "</td>";
                    echo  "<td>" . $row['telephoneNumber'] . "</td>";
                    echo  "<td>" . $row['email'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_close($conn);
            ?>
            <a href="log_in_page.php" class="exit"> sign out </a>
        </div>
    </body>
</html>
