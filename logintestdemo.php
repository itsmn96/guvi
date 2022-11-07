<?php
include 'libs/load.php';

$user="logintest";
$pass="logintest";
$result=null;
if (Session::get('is_loggedin')) {
    $userdata = Session::get('session_user');
    print("Welcome back, $userdata[username]");
    $result = $userdata;
}else{
    printf("No session Found, trying to login now.");
    $result = User::login($user ,$pass);
    if($result){
        echo "Login Success, $result[username]";
        Session::set('is_loggedin', true); 
        Session::set('session_user', $result);
    }else{
        echo "Login Failed";
    }
}