<?php
$host = "localhost";
$db = "sportPHP";
$user = "root";
$pass = "";

$konekcija = new mysqli($host,$user,$pass,$db);
$konekcija->set_charset('utf8');

if ($konekcija->connect_errno){
    exit("Greska:".$konekcija->connect_error.", kod:".$konekcija->connect_errno);
}
?>