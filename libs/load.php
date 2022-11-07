<?php
include_once 'includes/Session.class.php';
include_once 'includes/Mic.class.php';
include_once 'includes/Database.class.php';
include_once 'includes/User.class.php';
include_once 'includes/UserSession.class.php';

global $__site_config;
// change this path if you run outside lab. 
$__site_config = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/../photogramconfig.json');

Session::start(); 

function get_config($key, $default=null)
{
    global $__site_config;
    $array = json_decode($__site_config, true);
    if (isset($array[$key])) {
      return $array[$key];
    } else {
      return $default ;
    }
}

function load_template($name)
{
    include $_SERVER['DOCUMENT_ROOT']."/photogram/_templates/$name.php";
}

function validate_credentials($username, $password)
{
    if($username=="mohamed@mn.com" and $password=="password"){
    // if($username=="mn96" and $password=="mn96"){
      return true;
    }else{
      return false;
    }
}
