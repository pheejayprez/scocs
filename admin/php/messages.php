<?php
include_once("../include/config.php");

if(isset($_POST['send'])){
    $outgoing = mysqli_real_escape_string($con, $_POST['outgoing']);
    $incoming = mysqli_real_escape_string($con, $_POST['incoming']);
    $messages = mysqli_real_escape_string($con, $_POST['typingField']);

    $saveMsgQuery = "INSERT INTO `messages` (outgoing,incoming,messages)
    VALUES('$outgoing','$incoming', '$messages')";
    $runSaveQuery = mysqli_query($con, $saveMsgQuery);
    
    if(!$runSaveQuery){
        echo "query Failed";
    }

}
?>