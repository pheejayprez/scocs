<?php
include_once("../include/config.php");

session_start();
$searchValue = mysqli_real_escape_string($con, $_POST['search']);

$sql = "SELECT * FROM `users` WHERE NOT id = '{$_SESSION["id"]}' AND (name LIKE '%$searchValue%' OR name LIKE '%$searchValue%')";
$query = mysqli_query($con, $sql);

if(mysqli_num_rows($query) > 0){
    include_once("data.php");
}else{
    echo '<div id="errors">User Not Found</div>';
}
?>