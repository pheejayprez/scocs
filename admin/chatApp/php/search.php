<?php
include_once("config.php");

session_start();
$searchValue = mysqli_real_escape_string($conn, $_POST['search']);

$sql = "SELECT * FROM `admin` WHERE NOT id = '{$_SESSION["id"]}' AND (firstname LIKE '%$searchValue%' OR lastname LIKE '%$searchValue%')";
$query = mysqli_query($conn, $sql);

if(mysqli_num_rows($query) > 0){
    include_once("data.php");
}else{
    echo '<div id="errors">User Not Found</div>';
}
?>