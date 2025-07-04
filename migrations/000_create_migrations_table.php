<?php
require("../connection/connection.php");

$sql = "CREATE TABLE migrations(
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        migration_name VARCHAR(255) UNIQUE NOT NULL
        )";


$query = $mysqli->prepare($sql);
$result = $query->execute();

if($result){
    echo "Migrations table created successfully";
}else{
    echo "Unable to create migrations table:";
}