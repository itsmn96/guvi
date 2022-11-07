<pre>
<?php
setcookie("testcookie", "testvalue", time() + (86400*30) ,"/");
include 'libs/load.php';

print("_SESSION\n");
print_r($_SESSION);
printf("_SERVER \n");
print_r($_SERVER);


// if (isset($_GET['clear'])) {
//     session::unset(); 
// }

//     if (Session::isset('a')) {
//         printf("A already exists...value: ". $Session::get('a')."\n" );
//     } else {
//         $Session::set('a' ,time());
//         printf("Assigning new values...value: $_SESSION[a]\n");
//     }
//      if (isset($_GET['destroy'])){
//         printf("Destroying...\n");
//         session::destroy();
//      }

?></pre>