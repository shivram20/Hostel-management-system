<?php $env = parse_ini_file(__DIR__ . "env");

$host = $env["HOSTNAME"];
$user = $env['USER'];
$pass = $env['PASS'];
$db   = $env['DB'];
$con = mysqli_connect($host, $user, $pass, $db);

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}else{
    echo "Databse Connected";
}