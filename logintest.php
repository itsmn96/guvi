<?php
include 'libs/load.php';    

$user = "mn96";
$pass = isset($_GET['pass']) ? $_GET['pass']: '';
// $pass="password";
$result = null;

if(isset($_GET['logout'])) {
    Session::destroy();
    die("session destroyed, <a href='logintest.php'>Login</a>");
}

if (Session::get('is_loggedin')) { 
    $username = Session::get('session_username');
    $userobj = new User($username);
    print("Welcome Back ".$userobj->getFirstname()); 
    
}else{
    printf("No session Found, trying to login now.<br>");
    // printf("Login Success ".$user);
    $result = User::login($user ,$pass);
    // printf($user);
    if($result) {
        $userobj = new User($user);
        // echo ($userobj);
        echo "Login Success ", $userobj->getUsername();
        Session::set('is_loggedin', true);
        Session::set('session_username', $result);
    } else {
        echo "Login Failed , $user <br>";
    }
}
echo <<<EOL
<br><br><a href="logintest.php?logout">Logout</a>
EOL;

