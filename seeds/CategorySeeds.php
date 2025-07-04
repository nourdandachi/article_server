<?php 
require("../connection/connection.php");
require("../models/Category.php");

$categories = array("Technology", "Health", "Business", "Lifestyle", "Science", "Education", "Politics", "Arts");

$i = 0;
while ($i < count($categories)){
    $category = array(
        "name" => $categories[$i]
    );
    Category::create($mysqli, $category);
    $i++;
}
