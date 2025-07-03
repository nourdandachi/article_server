<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "articles-db";

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection is not connecting: " . $mysqli->connect_error);
}else{
    echo "Connection is connecting :)";
}