<pre>
<?php
include 'libs/load.php';
// printf("_SERVER \n");
// print_r($_SERVER);
// printf("_GET\n");
// print_r($_GET);
// print("_POST\n");
// print_r($_POST);
// print("_FILES\n");
// print_r($_FILES);
// print("_COOKIES\n");
// print_r($_COOKIE);
// if(signup("nainar", "admin", "nainar@mohamed.air", "9098909890")){
//     echo "Success";
// }else {
//     echo "Fail";
// }
$mic1= new Mic("roda");
$mic2= new Mic("hyperX");

Mic::testFunction();

// $mic1->brand="Roda";
// $mic2->brand="hyper";

//$mic1->light="RGB";
$mic1->setLight("white");

$mic1->setModel("hyper cast ");
print("Model of 1st mic is ".$mic1->getModelProxy());
print("\n".$mic1->getBrand());
print("\n".$mic2->getBrand());
//  
//print($mic1->light);

print("\n".$mic->price);

print("\nValue of 10+12 is ".$mic1->add(10, 12));
print("\nThis is mono font inside pre tag \n");

?>
</pre>
This is Regular Font.

