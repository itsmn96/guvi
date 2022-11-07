<?php
$time=microtime(true);
$option= [
    'cost'=>11,
];
echo password_hash("randstering", PASSWORD_BCRYPT, $option);
echo "\nTook ".(microtime(true) - $time). " sec\n";
echo strlen(microtime(true) - $time);
print"\n";
// if(password_verify("randstering", '$2y$15$KoZ1xZVP.WalnHQCnbYR1eosA2Xurq3A9bV7uX5NOYCTD26jNvKFW')){
//     print("Correct Password\n");
// }else{
//     print("Wrong Password\n");
// }