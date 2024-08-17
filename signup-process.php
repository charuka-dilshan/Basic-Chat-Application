<?php

$fname  = $_POST["fn"];
$lname  = $_POST["ln"];
$mobile = $_POST["mo"];
$email = $_POST["em"];
$password = $_POST["pw"];

if(empty ($fname)){
    echo("Please Enter Your First Name");

}elseif(empty($lname)){
    echo("Please Enter Your Last Name");

}elseif(empty($email)){
    echo("Please Enter Your Email Address");

}elseif(empty($mobile)){
    echo("Please Enter Your Mobile Number");

}elseif(empty ($password)){
    echo("Please Enter Your Password");

}else{
    $conn = new mysqli("host", "uname", "password", "chat_db", 3306);

if($conn->connect_error){
    die("Connection Error!");

}

$rs = $conn->query("SELECT * FROM `users` WHERE `email` = '$email'");

if($rs->num_rows<1){
    $conn->query("INSERT INTO `users` (`f_name` , `l_name` , `email` , `mobile` , `password`) 
                  VALUES ('$fname' , '$lname' , '$email' , '$mobile' , '$password')");
    echo("success");
}else{
    echo("User Has Been Already Registered");
}

}


?>