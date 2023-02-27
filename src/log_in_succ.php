<!DOCTYPE html>
<html lang = "en">
    <head>
        <title> mask sales </title>
        <link rel = "stylesheet" type = "text/css" href = "log_in_succ.css" />
        <script type = "text/javascript" src = "log_in_succ.js"></script>
        <meta charset = "utf-8" />
    </head>
    <body> 
        <div id="succInPage" class="component"> 
        <span class="bigTitle"> log in successfully！</span>
        <div class="content">
            <?php
               
                session_start();
                $username = isset($_SESSION['username']) ? $_SESSION['username'] : ""; 
                $regin = isset($_SESSION['regin']) ? $_SESSION['regin'] : ""; 
                if (!empty($username)) { 
            ?> 

            <span class="text"> Please choose a sale rep to help you:  </span>     
            <form action="log_in_succ_db.php" method="post">
                <select name="salerep" onchange="showSite(this.value)" require="required">
                <?php
                    $conn = mysqli_connect("localhost", "shyxt1", "tangxinran", "shyxt1");
                    if (!$conn) {
                        die('Could not connect: ' . mysqli_error($conn));
                    }
                    $sql_select="SELECT username FROM sales where regin='$regin'";
                    $result = mysqli_query($conn,$sql_select);                        

                    while($row = mysqli_fetch_array($result)) {
                        echo "<option >" . $row['username'] . "</option>";
                    }
                        
                    mysqli_close($conn);
                ?>
                </select>
            
            
                <input type="submit" id="ok" class="okButton" name="ok" value="ok">
            </form>
            <?php
                } else { 
            ?>
            <h1> no permission </h1> 
            <?php
                } 
            ?> 
        </div>
        <a href="log_in_page.php" class="exit">sign out</a>
        </div>
    </body>
</html>






