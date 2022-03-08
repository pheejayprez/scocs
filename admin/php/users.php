<?php
// include config file
include_once("../include/config.php");
session_start();
$sql = "SELECT * FROM `users` WHERE id != '{$_SESSION["id"]}' ";
$query = mysqli_query($con, $sql);

if(!$query){
    echo "query failed";
}else{
    if(mysqli_num_rows($query) == 0){
        echo '<div id="errors">No user are avilable to chat</div>';
    }elseif(mysqli_num_rows($query) > 0){
        include_once("data.php");
    }else{
        echo "failed while finding users";
    }
}
?>