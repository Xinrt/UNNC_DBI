<!DOCTYPE html>
<html lang = "en">
    <head>
        <title> mask sales </title>
        <link rel = "stylesheet" type = "text/css" href = "salerep_page.css">
        <meta charset = "utf-8" />
    </head>
    <body>
        <div id="salerepPage" class="component" >
            <span class="bigTitle"> Customer order record </span>

            <form action="salerep_db.php" method="post"> 
            <div class="tableroll" style="width:800px; height:300px; overflow-y:scroll;">
            <table class="show">
                <tr>
                    <!-- <th></th> -->
                    <!-- <th>id</th> -->
                    <th>odering ID</th>
                    <th>N95</th>
                    <th>surgical respirators</th>
                    <th>surgical N95 respirators</th>
                    <th>total quantity</th>
                    <th>amount of sales</th>
                    <th>customer username</th>
                    <!-- <th>customer telephone</th> -->
                    <th></th>
                </tr>

                <?php
                    $conn = mysqli_connect("localhost", "shyxt1", "tangxinran", "shyxt1");
                    if (!$conn) {
                        die('Could not connect: ' . mysqli_error($conn));
                    }

                    session_start(); 
                    $repusername = isset($_SESSION['username']) ? $_SESSION['username'] : ""; // check if empty


                    $sql_select="SELECT * FROM maskorder WHERE salerep='$repusername'";

                    $result = mysqli_query($conn,$sql_select);                        

                    while($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo  "<td>" . $row['orderingID'] . "</td>";
                        $orderingID = $row['orderingID'];
                        echo  "<td>" . $row['N95'] . "</td>";
                        echo  "<td>" . $row['surgical'] . "</td>";
                        echo  "<td>" . $row['surgicalN95'] . "</td>";
                        echo  "<td>" . $row['totalnumber'] . "</td>";
                        echo  "<td>" . $row['totalcost'] . "</td>";
                        echo  "<td>" . $row['username'] . "</td>";
                        // echo  "<td>" . $row['ctelephone'] . "</td>";
                        echo "<td><a href=\"salerep_db.php?orderingID=$orderingID\">delete</a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";

                    // echo "The number of masks which is aready ordered";
                    // echo "<table>";
                    // $sql_select="SELECT * FROM sales WHERE salerep='$repusername'";

                    // $result = mysqli_query($conn,$sql_select);                        

                    // while($row = mysqli_fetch_array($result)) {
                    //     echo "<tr>";
                    //     echo  "<td>" . $row['customerordered'] . "</td>";
                    //     echo "</tr>";
                    // }
                    // echo "</table>";
        
                    // mysqli_close($conn);
                ?>
            </table>
            </div>
            <div class="prompt">  
            <?php
                $err = isset($_GET["err"]) ? $_GET["err"] : "";
                switch ($err) {
                    case 1:
                        echo "Time is over 24h, you cannot delete it";
                        break;

                    case 2:
                        echo "Delete successfully";
                        break;

                    case 3:
                        echo "There are still remaining masks can be sold, you cannot delete it";
                        break;

                    case 4:
                        echo "You cannot delete it, and it will be treated as an anomaly order";
                        break;
                }
            ?> 
            </div>
            </form> 
            <a href="log_in_page.php" class="exit"> sign out </a>
        </div>
    </body>
</html>

