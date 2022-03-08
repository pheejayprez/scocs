<?php
include_once("../includes/config.php");
session_start();
$outgoingid = $_SESSION['id'];
$incomingid = 1;

// get message query
$getMsgQuery = "SELECT * FROM `messages` LEFT JOIN `users` ON messages.outgoing = users.id WHERE outgoing = '{$outgoingid}' AND incoming = '{$incomingid}' OR outgoing = '{$incomingid}' AND incoming = '{$outgoingid}'";
$runGetMsgQuery = mysqli_query($con, $getMsgQuery);
if(!$runGetMsgQuery){
    echo "Query Failed";
}else{
    if(mysqli_num_rows($runGetMsgQuery) > 0){
        while($row = mysqli_fetch_assoc($runGetMsgQuery)){
            if($row['outgoing'] == $outgoingid){
                echo '<div class="responseCard outgoing">
                <div class="response" style="text-align:right">
                    <!-- name -->
                    <h3 class="name">You</h3>
                    <!-- outgoing message -->
                    <p class="messages"  style="background:#85a3923d;border-radius: 10px; padding:5px;font-size: 12px">'.$row["messages"].'</p>
					<h4 class="name" style="color:black">'.$row["dateMSG"].'</h4>
                </div>
            </div>';
            }else{
                echo '<div class="request incoming">
					<!-- name -->
					<h3 class="name">Sugarcoat Creations</h3>
					<!-- incoming -->
					<p class="messages"  style="background:#e7b79a5e;border-radius: 10px; padding:5px">'.$row["messages"].'</p>
					<h4 class="name" style="color:black">'.$row["dateMSG"].'</h4>
			
            </div>';
            }
        }
    }else{
        echo '<div id="errors">Hey there, welcome to Sugarcoat Creations! <br> How may I help you?</div>';
    }
}
?>