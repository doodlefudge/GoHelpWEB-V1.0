<?php

ob_start();
$host = '68.233.234.175';
$db = 'camayaco_reservation';
$user='camayaco_root';
$password='))J(]U+vZwqP';
//$user = 'opencode_admin' $password = 'password';
$dsn = 'mysql:host='.$host.';dbname='.$db.'';
$pdo = new PDO($dsn, $user, $password);


?>