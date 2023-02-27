<!DOCTYPE html>
<html lang = "en"> 
    <head>
        <title> mask sales </title>
        <link rel = "stylesheet" type = "text/css" href = "order_page.css" />
        <meta charset = "utf-8" />
    </head>
    <body> 
    <div id="orderPage" class="component" >
        <span class="bigTitle"> Order Page </span>
        <div class="tableroll" style="width:1100px; height:300px; overflow-y:scroll;">
        <table class="show" >
            <tr>
                <th></th>
                <th>username</th>
                <th>N95</th>
                <th>surgical respirators</th>
                <th>surgical N95 respirators</th>
                <th>sale rep</th>
                <th> submit time </th>
                <th>total number</th>
                <th>total cost</th>
                <th>odering ID</th>
                <th></th>
            </tr>

            <?php
                $conn = mysqli_connect("localhost", "shyxt1", "tangxinran", "shyxt1");
                if (!$conn) {
                    die('Could not connect: ' . mysqli_error($conn));
                }

                session_start(); 
                $username = isset($_SESSION['username']) ? $_SESSION['username'] : ""; // check if empty

                $sql_select="SELECT * FROM maskorder WHERE username='$username'";
                $result = mysqli_query($conn,$sql_select);                        

                while($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo  "<td>" . $row['id'] . "</td>";
                    $id = $row['id'];
                    echo  "<td>" . $row['username'] . "</td>";
                    echo  "<td>" . $row['N95'] . "</td>";
                    echo  "<td>" . $row['surgical'] . "</td>";
                    echo  "<td>" . $row['surgicalN95'] . "</td>";
                    echo  "<td>" . $row['salerep'] . "</td>";
                    echo  "<td>" . $row['time'] . "</td>";
                    echo  "<td>" . $row['totalnumber'] . "</td>";
                    echo  "<td>" . $row['totalcost'] . "</td>";
                    echo  "<td>" . $row['orderingID'] . "</td>";
                    echo "<td><a href=\"order_db.php?id=$id\">delete</a></td>";
                    echo "</tr>";
                }
    
                mysqli_close($conn);
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
                }
            ?> 
        </div>
        <a href="mask_page.php" class="mask"> mask pruchase page </a>
        <a href="log_in_page.php" class="exit"> sign out </a>
        </div>
    </body>
</html>
