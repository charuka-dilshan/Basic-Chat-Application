<?php

session_start();

$msg = trim($_POST["msg"]);
$sender_id = $_SESSION["user"]["id"];
$receiver_id = $_POST["receiver"];

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$time = $d->format("Y-m-d H:i:s");

if(empty($msg)){
    echo("Please enter something to send !");

}elseif( $receiver_id == 0 ){
    echo("Select a user to send message !");
}else{
    $conn = new mysqli("host", "uname", "password", "chat_db", 3306);
    
    if($conn->connect_error){
        die("Connection error !");
    }

    $conn->query("INSERT INTO `chat`(`message` , `time` , `sender_id` , `receiver_id` ) VALUES ('".$msg."' , '".$time."' , '".$sender_id."' , '".$receiver_id."');");

    echo("success");
}