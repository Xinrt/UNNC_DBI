<?php
$orderingID = isset($_GET['orderingID']) ? $_GET['orderingID'] : "";
date_default_timezone_set("Asia/Shanghai");
$time = date('Y-m-d H:m:s');

session_start();
$salerep = isset($_SESSION['salerep']) ? $_SESSION['salerep'] : "";

$conn = mysqli_connect("localhost", "shyxt1", "tangxinran", "shyxt1");
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

$sql_select = "SELECT time FROM maskorder WHERE orderingID = '$orderingID'"; 
$ret = mysqli_query($conn, $sql_select);
$row = mysqli_fetch_array($ret); 

$countTime = floor((strtotime($time)-strtotime($row['time']))/86400);
if ($countTime >= 1) {
    $sql_select = "SELECT quota, customerordered FROM sales WHERE username = '$salerep'"; 
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
    // $quota = $row['quota'];
    // $customerordered = $row['customerordered'];

    if(($row['quota']-$row['customerordered'])<0)
    {        
        $sql_update = "UPDATE maskorder SET anomaly='Yes' 
                            WHERE oderingID = '$oderingID'"; 
        mysqli_query($conn, $sql_update);

        header("Location:salerep_page.php?err=4");
    } 
    else {
        header("Location:salerep_page.php?err=1"); 
    }
} 
else {
    $sql_select = "SELECT quota, customerordered FROM sales WHERE username = '$salerep'"; 
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 

    if(($row['quota']-$row['customerordered'])>=0)
    {
        header("Location:salerep_page.php?err=3");
    }
    else {
        $sql_delete = "DELETE FROM maskorder WHERE orderingID = '$orderingID'"; 
        mysqli_query($conn, $sql_delete);
    
        $sql_select = "SELECT totalnumber FROM maskorder WHERE orderingID = '$orderingID'"; 
        $ret = mysqli_query($conn, $sql_select);
        $row = mysqli_fetch_array($ret); 
        $totalnumber = $row['totalnumber'];
    
        $sql_update = "UPDATE sales SET customerordered=totalnumber-'$totalnumber' 
                            WHERE username='$salerep'"; 
        mysqli_query($conn, $sql_update);
    
        header("Location:salerep_page.php?err=2"); 
    }
}
mysqli_close($conn);
?>