<?php
    $N95 = isset($_POST['N95']) ? $_POST['N95'] : "";
    $surgical = isset($_POST['surgical']) ? $_POST['surgical'] : "";
    $surgicalN95 = isset($_POST['surgicalN95']) ? $_POST['surgicalN95'] : "";
    date_default_timezone_set("Asia/Shanghai");
    $time = date('Y-m-d H:m:s');
    // $submitTime=time();
    $totalcost = isset($_POST['total']) ? $_POST['total'] : "";
    $code = rand(000000, 999999);

    $conn = mysqli_connect("localhost", "shyxt1", "tangxinran", "shyxt1"); //connect database

    //check the connection
    if (!$conn) {
        die('Could not connect: ' . mysqli_error($conn));
    }

    session_start(); 
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : ""; // check if empty
    $salerep = isset($_SESSION['salerep']) ? $_SESSION['salerep'] : "";
    $regin = isset($_SESSION['regin']) ? $_SESSION['regin'] : ""; 

    //check the 0 purchases
    if($N95==NULL){
        $N95=0;
    }
    if($surgical==NULL)
    {
        $surgical=0;
    }
    if($surgicalN95==NULL)
    {
        $surgicalN95=0;
    }
    if(($N95==NULL) && ($surgical==NULL) && ($surgicalN95==NULL))
    {
        $totalcost=0;
    }

    $totalnumber = $N95+$surgical+$surgicalN95;
    if($N95==NULL && $surgical==NULL && $surgicalN95==NULL){
        $totalnumber=0;
    }

    //insert into database
    $sql_insert = "INSERT INTO maskorder(username,N95,surgical,surgicalN95,salerep,time,totalnumber,totalcost,orderingID,regin) 
                    VALUES('$username','$N95','$surgical','$surgicalN95','$salerep',NOW(),'$totalnumber','$totalcost','$code','$regin')"; 
    mysqli_query($conn, $sql_insert);

    $sql_update = "UPDATE customer SET totalnumber=totalnumber+'$totalnumber',totalcost=totalcost+'$totalcost'  
    WHERE username='$username'"; 
    mysqli_query($conn, $sql_update);

    $sql_update = "UPDATE sales SET customerordered=totalnumber+'$totalnumber' 
                        WHERE username='$salerep'"; 
    mysqli_query($conn, $sql_update);




    $sql_update2 = "UPDATE sales SET N95=N95+'$N95',surgical=surgical+'$surgical',surgicalN95=surgicalN95+'$surgicalN95',totalnumber=totalnumber+'$totalnumber',totalcost=totalcost+'$totalcost' 
                    WHERE username='$salerep'"; 
    mysqli_query($conn, $sql_update2);

    $sql_update3 = "UPDATE regin SET N95=N95+'$N95',surgical=surgical+'$surgical',surgicalN95=surgicalN95+'$surgicalN95',totalnumber=totalnumber+'$totalnumber',totalcost=totalcost+'$totalcost' 
                    WHERE regin='$regin'"; 
    mysqli_query($conn, $sql_update3);
     
    header("Location:order_page.php");

    mysqli_close($conn);
?>