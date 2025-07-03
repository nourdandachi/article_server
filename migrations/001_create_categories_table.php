<?php 
require("../connection/connection.php");

$migration_name = "001_create_categories_table";
$migration_sql = "SELECT * 
                  FROM migrations
                  WHERE migration_name = ?";

$migration_query = $mysqli->prepare($migration_sql);
$migration_query->bind_param("s", $migration_name);
$migration_query->execute();
$migration_result = $migration_query->get_result();

if($migration_result->num_rows > 0){
    echo "$migration_name already applied";
    return;
}

$sql = "CREATE TABLE categories(
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL
        )";

$query= $mysqli->prepare($sql);
$result= $query->execute();

if($result){
    echo "Categories table created successfully ";

    $insert_sql = "INSERT INTO migrations (migration_name)
                   VALUES (?)";
    
    $insert_query = $mysqli->prepare($insert_sql);
    $insert_query->bind_param("s", $migration_name);

    $insert_result = $insert_query->execute();

    if($insert_result){
        echo "$migration_name logged successfully";
    }
    else{
        echo "Table created but failed to log migration";
    }

}else{
    echo "Execution Failed";
}