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
        header("Location:administrator_page2.php?err=1");
    } else {
        $sql_select = "SELECT username FROM manager WHERE username='$username'";
        $ret = mysqli_query($conn, $sql_select);
        $row = mysqli_fetch_array($ret);
        if($username == $row['username']) {
            header("Location:administrator_page2.php?err=1");
        } else { 
            $sql_select = "SELECT username FROM sales WHERE username='$username'";
            $ret = mysqli_query($conn, $sql_select);
            $row = mysqli_fetch_array($ret);
            if($username == $row['username']) {
                header("Location:administrator_page2.php?err=1");
            } else { 
                        $sql_insert = "INSERT INTO sales(username,realName,password,employeeID,telephoneNumber,email) 
                                        VALUES('$username','$realName','$password','$employeeID','$telephoneNumber','$email')"; //执行SQL语句
                        mysqli_query($conn, $sql_insert);
                        header("Location:administrator_page2.php?err=2");
            }
        }
    }  
    mysqli_close($conn);
?>

