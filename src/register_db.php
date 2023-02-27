<?php
$username = isset($_POST['username']) ? $_POST['username'] : "";
$realName = isset($_POST['realName']) ? $_POST['realName'] : "";
$passportId = isset($_POST['passportId']) ? $_POST['passportId'] : "";
$telephoneNumber = isset($_POST['telephoneNumber']) ? $_POST['telephoneNumber'] : "";
$regin = isset($_POST['regin']) ? $_POST['regin'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$rePassword = isset($_POST['rePassword']) ? $_POST['rePassword'] : "";

if ($password == $rePassword) { 
    $conn = mysqli_connect("localhost", "shyxt1", "tangxinran", "shyxt1"); 
    $sql_select = "SELECT username FROM manager WHERE username = '$username'"; 
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
    if ($username == $row['username']) { 
        header("Location:register_page.php?err=1");
    } else {
        $sql_select = "SELECT username FROM sales WHERE username = '$username'"; 
        $ret = mysqli_query($conn, $sql_select);
        $row = mysqli_fetch_array($ret); 
        if ($username == $row['username']) { 
            header("Location:register_page.php?err=1");
        } else {
            $sql_select = "SELECT username FROM customer WHERE username = '$username'"; 
            $ret = mysqli_query($conn, $sql_select);
            $row = mysqli_fetch_array($ret); 
            if ($username == $row['username']) { 
                header("Location:register_page.php?err=1");
            } else { 
                $sql_insert = "INSERT INTO customer(username,realName,passportId,telephoneNumber,regin,email,password,rePassword) 
                                VALUES('$username','$realName','$passportId','$telephoneNumber','$regin','$email','$password','$rePassword')"; //执行SQL语句
                mysqli_query($conn, $sql_insert);
                header("Location:register_page.php?err=3");
            }
        } 
    }
    mysqli_close($conn);
} 
else {
    header("Location:register_page.php?err=2");
} 
?>

