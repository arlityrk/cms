<?php

$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['db_password'] = '';
$db['db_name'] = 'cms';

// $key => $value defineerib key ja value eraldi muutujatesse mida saab kasutada. And foreach($db as $key => $value) represents the key and the value of the current item that is being looped through in the array.
foreach($db as $key => $value){
    
    define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

/*if($connection){
    
    echo "DB connection succesful";
}*/

?>