<?php

session_start();

$email = $_POST["email"];
$password = $_POST["password"];

if (empty($email)){
    echo("Please Enter Your Email Address !");
}elseif(empty ($password)){
    echo("Please Enter Your Password !");
}else{
    $conn = new mysqli("host", "uname", "password", "chat_db", 3306);
    if ($conn->connect_error){
        die("connection error !");
    }

    $rs = $conn->query("SELECT `id` ,`f_name`, `l_name`, `mobile`, `email`, `password` FROM `users` WHERE `email` ='$email' AND `password` = '$password'");

    if($rs->num_rows==1){
        $user = $rs->fetch_assoc();
        $_SESSION["user"] = $user;
        echo("success");
    }else{ 
        echo("user not found !");
    }
}