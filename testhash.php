<?php

$pass = isset($_GET['pass']) ? $_GET['pass'] : "RandomPasswordThatIsSecure";
echo(md5($pass));
  
$str = <<<EOL
No string-to-array function exists because it is not needed. If you reference a string.
EOL;

echo("Data Length: ".strlen($str)."\n");

$md5= md5($str);
$md5len = strlen($md5);

$b64= base64_encode($str);
$b64len= strlen($b64);

echo("MD5: $md5 (Length : $md5len)\n");
echo("Base64: $b64 \n(Length : $b64len)\n");


$data="Mohamed";

foreach (hash_algos() as $v){
    $r= hash($v, $data, false);
    printf("%-12s %3d %s\n", $v, strlen($r), $r);
}