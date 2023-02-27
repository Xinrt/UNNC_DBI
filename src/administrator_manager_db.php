<?php

$username = isset($_POST['username']) ? $_POST['username'] : "";
$realName = isset($_POST['realName']) ? $_POST['realName'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$employeeID = isset($_POST['employeeID']) ? $_POST['employeeID'] : "";
$telephoneNumber = isset($_POST['telephoneNumber']) ? $_POST['telephoneNumber'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";


    $conn = mysqli_connect("localhost", "shyxt1", "tangxinran", "shyxt1"); 
    $sql_select = "SELECT username FROM customer WHERE username = '$username'"; 
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
    if ($username == $row['username']) { 
        header("Location:administrator_page.php?err=1");
    } else {
        $sql_select = "SELECT username FROM sale WHERE username='$username'";
        $ret = mysqli_query($conn, $sql_select);
        $row = mysqli_fetch_array($ret);
        if($username == $row['username']) {
            header("Location:administrator_page.php?err=1");
        } else { 
            $sql_select = "SELECT * FROM manager";
            $ret = mysqli_query($conn, $sql_select);
           
            if(mysqli_num_rows($ret)<1)     
            {
                $sql_insert = "INSERT INTO manager(username,realName,password,employeeID,telephoneNumber,email) 
                            VALUES('$username','$realName','$password','$employeeID','$telephoneNumber','$email')"; //执行SQL语句
                mysqli_query($conn, $sql_insert);
                header("Location:administrator_page.php?err=2");
            } else {
                $sql_update = "UPDATE manager SET username='$username',realName='$realName',password='$password',employeeID='$employeeID',telephoneNumber='$telephoneNumber',email='$email'";
                mysqli_query($conn, $sql_update);
                header("Location:administrator_page.php?err=3");
            }   
        }
    } 
    mysqli_close($conn);
?>
