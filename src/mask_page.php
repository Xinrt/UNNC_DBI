<!DOCTYPE html>
<html lang = "en">
    <head>
        <title> mask sales </title>
        <link rel = "stylesheet" type = "text/css" href = "mask_page.css" />
        <script type = "text/javascript" src = "mask_page.js"></script>
        <meta charset = "utf-8" />
    </head>
    <body> 
        <div id="maskPage" class="component" >
            <form action="mask_db.php" method="post">
            <span class="bigTitle"> Mask </span>
            <a href="log_in_page.php" class="exit"> sign out </a>

            <div class="MaskN95">
            <img class="N95" src="N95.jpg" alt="N95 mask" width="60" height="60">
            <div class="text">
            <span> N95&nbsp;mask&nbsp;&nbsp;($5&nbsp;each)<br />
            purchase amount: </span> <br />
            <input type="text" id="idN95" class="box" name="N95" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onchange="computCost()" />
            <span> cost: </span>
            <input type="text" id="N95cost" name="N95cost" class="box2" size = "5" onfocus = "this.blur()"/>
            </div>
            </div>

            <div class="Masksurgical">
            <img class="surgical" src="surgical_respirators.jpg" alt="surgical respirators" width="42" height="42">
            <div class="text">
            <span> surgical&nbsp;respirators&nbsp;&nbsp;($1&nbsp;each) <br />
            purchase amount: </span> <br />
            <input type="text" id="idsurgical" class="box" name="surgical" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onchange="computCost()" />
            <span> cost: </span>
            <input type="text" id="surgicalcost" name="surgicalcost" class="box2" size = "5" onfocus = "this.blur()"/>
            </div>
            </div>

            <div class="MasksurgicalN95">
            <img class="surgicalN95" src="surgical_N95_respirators.jpg" alt="surgical N95 respirators" width="42" height="42">
            <div class="text">
            <span> surgical&nbsp;N95&nbsp;respirators&nbsp;&nbsp;($6&nbsp;each)<br />
            purchase amount: </span> <br />
            <input type="text" id="idsurgicalN95" class="box" name="surgicalN95" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onchange="computCost()" />
            <span> cost: </span>
            <input type="text" id="surgicalN95cost" name="surgicalN95cost" class="box2" onfocus = "this.blur()"/>
            </div>
            </div>
            <br /><br />

            <span class="total" onchange="computCost()">total cost: </span>
            <input type = "text" id = "total" name="total" class="box3" size = "5" onfocus = "this.blur()"/>

            <input type="submit" id="submit" class="submitButton" name="submit" value="submit">

            <a href="order_page.php" class="order"> my orders </a>
            </form>
        </div>
    </body>
</html>
