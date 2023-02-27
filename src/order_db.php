<?php
$id = isset($_GET['id']) ? $_GET['id'] : "";
date_default_timezone_set("Asia/Shanghai");
$time = date('Y-m-d H:m:s');
session_start(); 
$username = isset($_SESSION['username']) ? $_SESSION['username'] : ""; // check if empty
$salerep = isset($_SESSION['salerep']) ? $_SESSION['salerep'] : "";

$conn = mysqli_connect("localhost", "shyxt1", "tangxinran", "shyxt1");
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

$sql_select = "SELECT time FROM maskorder WHERE id = '$id'"; 
$ret = mysqli_query($conn, $sql_select);
$row = mysqli_fetch_array($ret); 

$countTime = floor((strtotime($time)-strtotime($row['time']))/86400);
if ($countTime >= 1) {
    header("Location:order_page.php?err=1");
} 
else {
    $sql_delete = "DELETE FROM maskorder WHERE id = '$id'"; 
    mysqli_query($conn, $sql_delete);

    $sql_select = "SELECT totalnumber FROM maskorder WHERE id = '$id'"; 
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); 
    $totalnumber = $row['totalnumber'];
    $totalcost = $row['totalcost'];

    $sql_update = "UPDATE sales SET customerordered=totalnumber-'$totalnumber' 
                        WHERE username='$salerep'"; 
    mysqli_query($conn, $sql_update);

    $sql_update = "UPDATE customer SET totalnumber=totalnumber-'$totalnumber',totalcost=totalcost-'$totalcost'  
    WHERE username='$username'"; 
    mysqli_query($conn, $sql_update);

    $sql_update2 = "UPDATE sales SET N95=N95-'$N95',surgical=surgical-'$surgical',surgicalN95=surgicalN95-'$surgicalN95',totalnumber=totalnumber-$totalnumber',totalcost=totalcost-'$totalcost' 
                    WHERE username='$salerep'"; 
    mysqli_query($conn, $sql_update2);

    $sql_update3 = "UPDATE regin SET N95=N95-'$N95',surgical=surgical-'$surgical',surgicalN95=surgicalN95-'$surgicalN95',totalnumber=totalnumber-'$totalnumber',totalcost=totalcost-'$totalcost' 
                    WHERE regin='$regin'"; 
    mysqli_query($conn, $sql_update3);

    header("Location:order_page.php?err=2"); 
}
mysqli_close($conn);

?>