<?php
$username = isset($_POST['username']) ? $_POST['username'] : "";
$regin = isset($_POST['regin']) ? $_POST['regin'] : "";
$quota = isset($_POST['quota']) ? $_POST['quota'] : "";

$conn = mysqli_connect("localhost", "shyxt1", "tangxinran", "shyxt1");
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

$sql_select = "SELECT username FROM sales WHERE username = '$username'"; 
$ret = mysqli_query($conn, $sql_select);
$row = mysqli_fetch_array($ret); 

if ($username == $row['username']) {
    $sql_update = "UPDATE sales SET regin='$regin',quota='$quota' WHERE username='$username'"; 
        mysqli_query($conn, $sql_update);
        header("Location:manager_page.php?err=2");
} else {
    header("Location:manager_page.php?err=1");
}
mysqli_close($conn);
?>
