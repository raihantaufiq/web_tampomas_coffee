<?php


$db_host = 'localhost'; // host
$db_user = 'root'; // user basis data
$db_password = ''; // password
$db_name = 'db_prokon'; // nama basis data


$db_connect = mysqli_connect($db_host, $db_user, $db_password, $db_name);

echo mysqli_error($db_connect);



?>