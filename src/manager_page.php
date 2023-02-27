<!DOCTYPE html>
<html>
	<head>
        <title> mask sales </title>
        <link rel = "stylesheet" type = "text/css" href = "manager_page.css">
        <meta charset = "utf-8" />
	</head>
	<body>
        <div class="component">
        <nav class="navbar">
        <ul>
            <li><a href="#sale_quota">Sales' Quota</a></li>
            <li><a href="#masks">Masks</a></li>
            <li><a href="#sale_rep">Sales Rep</a></li>
            <li><a href="#regin">Regin</a></li>
            <li><a href="#under_odering">Under Ordering</a></li>
            <li><a href="#date_in_week">Date (in week)</a></li>
            <li><a href="#user">Customer</a></li>
            <li><a href="#anomaly">Anomaly</a></li>

        </ul>
        </nav>
        
        <section id="sale_quota">
            <div class="content">
            <span class="bigTitle"> sales' quota edit page </span>
            <form action="quota_db.php" method="post"> 
                    <span class="smallTitle"> Please fill the sales' username which you want to edit </span>
                    <table class="edit">
                    <tr>
                        <th> sale rep's username </th>
                        <th> regin </th>
                        <th> quota </th>
                    </tr>
                    <tr> 
                        <td><input type="text" id="idusername" name="username" required="required"></td>    
                        <td> 
                            <select name="regin">
                            <option value="China"> China </option>
                            <option value="America"> America </option>
                            <option value="UK"> UK </option>
                            <option value="Japan"> Japan </option>
                            <option value="Korea"> Korea </option>
                            <option value="Italy"> Italy </option>
                            <option value="Canada"> Canada </option>
                            </select>
                        </td>
                        <td><input type="text" id="idquota" name="quota" required="required"></td> 
                    </tr> 
                    </table>
                    <div class="prompt">  
                    <?php
                        $err = isset($_GET["err"]) ? $_GET["err"] : "";
                        switch ($err) {
                            case 1:
                                echo "The username does not exist.";
                                break;

                            case 2:
                                echo "edit successfully";
                                break;
                        }
                    ?> 
                    </div>
                    <input type="submit" id="ok" class="okButton" name="ok" value="ok">
                    <input type="reset" id="reset" class="resetButton" name="reset" value="reset">
            </form>
            <div class="tableroll" style="width:500px; height:300px; overflow-y:scroll;">
            <table class="show">
            <tr>
                <th>username</th>
                <th>real name</th>
                <th>employee ID</th>
                <th>regin</th>
                <th>quota</th>
            </tr> 
            
            <?php
                $conn = mysqli_connect("localhost", "shyxt1", "tangxinran", "shyxt1");
                if (!$conn) {
                    die('Could not connect: ' . mysqli_error($conn));
                }
                $sql="SELECT * FROM sales";
                $result = mysqli_query($conn,$sql);

                while($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo  "<td>" . $row['username'] . "</td>";
                    echo "<td>" .$row['realName'] . "</td>";
                    echo "<td>" .$row['employeeID'] . "</td>";
                    echo "<td>" .$row['regin'] . "</td>";
                    echo "<td>" .$row['quota'] . "</td>";
                    echo "</tr>";
                }
                mysqli_close($conn);
            ?>     
            </table>
            </div>               
            </div>
            <a href="log_in_page.php" class="exit"> sign out </a>
        </section>







        <section id="masks">
            <div class="content">
            <span class="bigTitle"> mask analysis page </span>

            <div class="tableroll" style="width:525px; height:300px; overflow-y:scroll;">
            <table class="show">
                <tr>
                <th> ordering ID </th>
                <th> total number of sold masks </th>
                <th> normal </th>
                <th> anomalies </th>
                <th> total revenues </th>
                </tr>
            

            <?php
                $conn = mysqli_connect("localhost", "shyxt1", "tangxinran", "shyxt1");
                if (!$conn) {
                    die('Could not connect: ' . mysqli_error($conn));
                }
                $sql_select="SELECT * FROM maskorder";
                $result = mysqli_query($conn,$sql_select);

                while($row = mysqli_fetch_array($result)) {
                    if($row['anomaly'] == 'Yes') {
                        echo "<tr>";
                        echo  "<td>" . $row['orderingID'] . "</td>";
                        echo  "<td>" . $row['totalnumber'] . "</td>";
                        echo "<td>0</td>";
                        echo "<td>" . $row['totalnumber'] . "</td>";
                        echo "<td>" .$row['totalcost'] . "</td>";
                        echo "</tr>";
                    }
                    else {
                        echo "<tr>";
                        echo  "<td>" . $row['orderingID'] . "</td>";
                        echo  "<td>" . $row['totalnumber'] . "</td>";
                        echo "<td>" . $row['totalnumber'] . "</td>";
                        echo "<td>0</td>";
                        echo "<td>" .$row['totalcost'] . "</td>";
                        echo "</tr>";
                    }      
                }
                mysqli_close($conn);
            ?>       

            </table>
            </div>
            </div>
            <a href="log_in_page.php" class="exit"> sign out </a>
        </section>






        <section id="sale_rep">
            <div class="content">
            <span class="bigTitle"> sale reps analysis page </span>

            <div class="tableroll" style="width:700px; height:300px; overflow-y:scroll;">
            <table class="show">
                <tr>
                <th> Sale Name </th>
                <th> Sale real name </th>
                <th> sold N95 </th>
                <th> sold surgical respirators </th>
                <th> sold surgical N95 respirators </th>
                <th> total number </th>
                <th> total revenues </th>
                </tr>

                <?php
                    $conn = mysqli_connect("localhost", "shyxt1", "tangxinran", "shyxt1");
                    if (!$conn) {
                        die('Could not connect: ' . mysqli_error($conn));
                    }
                    $sql_select="SELECT * FROM sales";
                    $result = mysqli_query($conn,$sql_select);

                    while($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo  "<td>" . $row['username'] . "</td>";
                        echo  "<td>" . $row['realName'] . "</td>";
                        echo  "<td>" . $row['N95'] . "</td>";
                        echo  "<td>" . $row['surgical'] . "</td>";
                        echo  "<td>" . $row['surgicalN95'] . "</td>";
                        echo  "<td>" . $row['totalnumber'] . "</td>";
                        echo  "<td>" . $row['totalcost'] . "</td>";
                        echo "</tr>";      
                    }
                    mysqli_close($conn);
                ?> 
            </table>
            </div>
            </div>
            <a href="log_in_page.php" class="exit"> sign out </a>
        </section>







        <section id="regin">
            <div class="content">
            <span class="bigTitle"> regin analysis page </span>

            <div class="tableroll" style="width:600px; height:300px; overflow-y:scroll;">
            <table class="show">
                <tr>
                <th> Regin </th>
                <th> sold N95 </th>
                <th> sold surgical respirators </th>
                <th> sold surgical N95 respirators </th>
                <th> total number </th>
                <th> total revenues </th>
                </tr>

                <?php
                    $conn = mysqli_connect("localhost", "shyxt1", "tangxinran", "shyxt1");
                    if (!$conn) {
                        die('Could not connect: ' . mysqli_error($conn));
                    }
                    $sql_select="SELECT * FROM regin";
                    $result = mysqli_query($conn,$sql_select);

                    while($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo  "<td>" . $row['regin'] . "</td>";
                        echo  "<td>" . $row['N95'] . "</td>";
                        echo  "<td>" . $row['surgical'] . "</td>";
                        echo  "<td>" . $row['surgicalN95'] . "</td>";
                        echo  "<td>" . $row['totalnumber'] . "</td>";
                        echo  "<td>" . $row['totalcost'] . "</td>";
                        echo "</tr>";      
                    }
                    mysqli_close($conn);
                ?> 
            </table>
            </div>
            </div>
            <a href="log_in_page.php" class="exit"> sign out </a>
        </section>




        <section id="under_odering">
            <div class="content">
            <span class="bigTitle"> Masks under odering </span>

            <div class="tableroll" style="width:600px; height:300px; overflow-y:scroll;">
            <table class="show">
                <tr>
                <th> ordering ID </th>
                <th> N95 </th>
                <th> surgical respirators </th>
                <th> surgical N95 respirators </th>
                <th> total number </th>
                <th> total revenues </th>
                </tr>

                <?php
                    $conn = mysqli_connect("localhost", "shyxt1", "tangxinran", "shyxt1");
                    if (!$conn) {
                        die('Could not connect: ' . mysqli_error($conn));
                    }
                    $sql_select="SELECT * FROM maskorder";
                    $result = mysqli_query($conn,$sql_select);

                    date_default_timezone_set("Asia/Shanghai");
                    $time = date('Y-m-d H:m:s');
    
                    while($row = mysqli_fetch_array($result)) {
                        $countTime = floor((strtotime($time)-strtotime($row['time']))/86400);
                        if($countTime < 1)
                        {
                            echo "<tr>";
                            echo  "<td>" . $row['orderingID'] . "</td>";
                            echo  "<td>" . $row['N95'] . "</td>";
                            echo  "<td>" . $row['surgical'] . "</td>";
                            echo  "<td>" . $row['surgicalN95'] . "</td>";
                            echo  "<td>" . $row['totalnumber'] . "</td>";
                            echo  "<td>" . $row['totalcost'] . "</td>";
                            echo "</tr>"; 
                        }     
                    }
                    mysqli_close($conn);
                ?> 
            </table>
            </div>
            </div>
            <a href="log_in_page.php" class="exit"> sign out </a>
        </section>




        <section id="date_in_week">
            <div class="content">
            <span class="bigTitle"> weekly analysis page </span>

            <div class="tableroll" style="width:500px; height:300px; overflow-y:scroll;">
            <table class="show">
                <tr>
                <th> week </th>
                <th> N95 </th>
                <th> surgical respirators </th>
                <th> surgical N95 respirators </th>
                <th> total number </th>
                <th> total revenues </th>
                </tr>

               
            </table>
            </div>
            </div>
            <a href="log_in_page.php" class="exit"> sign out </a>
        </section>




        <section id="user">
            <div class="content">
            <span class="bigTitle"> Customer analysis page </span>

            <div class="tableroll" style="width:400px; height:300px; overflow-y:scroll;">
            <table class="show">
                <tr>
                <th> customer username </th>
                <th> total pruchase </th>
                <th> count </th>
                <th> average </th>
                </tr>

                <?php
                    $conn = mysqli_connect("localhost", "shyxt1", "tangxinran", "shyxt1");
                    if (!$conn) {
                        die('Could not connect: ' . mysqli_error($conn));
                    }
                    $sql_select="SELECT * FROM customer";
                    $result = mysqli_query($conn,$sql_select);

                    while($row = mysqli_fetch_array($result)) {
                        if($row['totalnumber'] != 0) {
                            echo "<tr>";
                            echo  "<td>" . $row['username'] . "</td>";
                            echo  "<td>" . $row['totalcost'] . "</td>";
                            echo  "<td>" . $row['totalnumber'] . "</td>";
                            echo  "<td>" . ($row['totalcost']/$row['totalnumber']) . "</td>";
                            echo "</tr>";  
                        }    
                    }
                    mysqli_close($conn);
                ?> 
            </table>
            </div>
            </div>
            <a href="log_in_page.php" class="exit"> sign out </a>
        </section>







        <section id="anomaly">
            <div class="content">
            <span class="bigTitle"> anomaly orders </span>

            <div class="tableroll" style="width:725px; height:300px; overflow-y:scroll;">
            <table class="show">
                <tr>
                <th>odering ID</th>
                <th>N95</th>
                <th>surgical respirators</th>
                <th>surgical N95 respirators</th>
                <th>total quantity</th>
                <th>amount of sales</th>
                <th>customer username</th>
                </tr>

                <?php
                    $conn = mysqli_connect("localhost", "shyxt1", "tangxinran", "shyxt1");
                    if (!$conn) {
                        die('Could not connect: ' . mysqli_error($conn));
                    }
                    $sql_select="SELECT * FROM maskorder";
                    $result = mysqli_query($conn,$sql_select);

                    while($row = mysqli_fetch_array($result)) {
                        if($row['anomaly']=='Yes') 
                        {
                            echo "<tr>";
                            echo  "<td>" . $row['oderingID'] . "</td>";
                            echo  "<td>" . $row['N95'] . "</td>";
                            echo  "<td>" . $row['surgical'] . "</td>";
                            echo  "<td>" . $row['surgicalN95'] . "</td>";
                            echo  "<td>" . $row['totalnumber'] . "</td>";
                            echo  "<td>" . $row['totalcost'] . "</td>";
                            echo  "<td>" . $row['username'] . "</td>";
                            echo "</tr>"; 
                        }     
                    }
                    mysqli_close($conn);
                ?> 
            </table>
            </div>
            </div>
        </section>
        </div>

        <script src="https://cdn.bootcdn.net/ajax/libs/smooth-scroll/16.1.0/smooth-scroll.min.js"></script>
        <script src="manager_page.js"></script>
	</body>
</html>

