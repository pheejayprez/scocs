<?php
session_start();
include_once("../includes/config.php");

if(isset($_POST['send'])){
    $outgoing = $_SESSION['id'];
    $incoming = 1;
    $messages = mysqli_real_escape_string($con, $_POST['typingField']);

    $saveMsgQuery = "INSERT INTO `messages` (outgoing,incoming,messages)
    VALUES('$outgoing','$incoming', '$messages')";
    $runSaveQuery = mysqli_query($con, $saveMsgQuery);
    
    if(!$runSaveQuery){
        echo "query Failed";
    }

}
?>