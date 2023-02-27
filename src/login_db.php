<?php
$username = isset($_POST['username']) ? $_POST['username'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";

if (!empty($username) && !empty($password)) { 
    $conn = mysqli_connect("localhost", "shyxt1", "tangxinran", "shyxt1"); 
    $sql_select = "SELECT username,password,regin FROM customer WHERE username = '$username' AND password = '$password'"; //执行SQL语句
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
    if ($username == $row['username'] && $password == $row['password'])  
    { 
        $regin=$row['regin'];
        session_start(); 
        $_SESSION['username'] = $username; 
        $_SESSION['regin'] = $regin; 
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d H:m:s');
        
        $sql_logs = "INSERT INTO onlinecustomer(username,regin,ip,date) VALUES('$username','$regin','$ip','$date')";
        mysqli_query($conn, $sql_logs);
        
        header("Location:log_in_succ.php"); 
        mysqli_close($conn);
    }
    else 
    { 
        $sql_select = "SELECT username,password FROM sales WHERE username = '$username' AND password = '$password'"; //执行SQL语句
        $ret = mysqli_query($conn, $sql_select);
        $row = mysqli_fetch_array($ret); 
        if ($username == $row['username'] && $password == $row['password'])  
        { 
            session_start(); 
            $_SESSION['username'] = $username; 

            header("Location:salerep_page.php"); 
            mysqli_close($conn);
        }
        else 
        {
            $sql_select = "SELECT username,password FROM manager WHERE username = '$username' AND password = '$password'"; //执行SQL语句
            $ret = mysqli_query($conn, $sql_select);
            $row = mysqli_fetch_array($ret); 
            if ($username == $row['username'] && $password == $row['password'])  
            { 
                session_start(); 
                $_SESSION['username'] = $username; 

                header("Location:manager_page.php"); 
                mysqli_close($conn);
            }
            else 
            {
                $sql_select = "SELECT username,password FROM admin WHERE username = '$username' AND password = '$password'"; //执行SQL语句
                $ret = mysqli_query($conn, $sql_select);
                $row = mysqli_fetch_array($ret); 
                if ($username == $row['username'] && $password == $row['password'])  
                { 
                    session_start(); 
                    $_SESSION['username'] = $username; 

                    header("Location:administrator_page.php"); 
                    mysqli_close($conn);
                }
                else 
                { 
                    
                    header("Location:log_in_page.php?err=1");
                }
            }
        }
    }
} 
else { 
    header("Location:log_in_page.php?err=2");
} ?>


