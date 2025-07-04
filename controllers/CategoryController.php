<?php 

require(__DIR__ . "/../models/Category.php");
require(__DIR__ . "/../connection/connection.php");
require(__DIR__ . "/../services/CategoryService.php");
require(__DIR__ . "/../services/ResponseService.php");

class CategoryController{
    
    public function getAllCategories(){
        global $mysqli;

        if(!isset($_GET["id"])){
            $categories = Category::all($mysqli);
            $categories_array = CategoryService::categoriesToArray($categories); 
            echo ResponseService::success_response($categories_array);
            return;
        }

        $id = $_GET["id"];
        $category = Category::find($mysqli, $id)->toArray();
        echo ResponseService::success_response($category);
        return;
    }

    public function deleteAllcategories(){
         global $mysqli;

        if(!isset($_GET["id"])){
            $deleting = Category::deleteAll($mysqli);
            if(!$deleting){
                echo ResponseService::failure_message("Error in deleting categories");
                return;
            }

            echo ResponseService::success_response("Categories deleted successfully");
            return;
            
        }

        $id = $_GET["id"];
        $category = Category::find($mysqli, $id);

        if(!$category){
            echo ResponseService::failure_message("Category not found");
            return;
        }
        $category->delete($mysqli);
        echo ResponseService::success_message("Category deleted successfully");
        return;
    }

    public function updateCategory(){
        global $mysqli;

        $data = json_decode(file_get_contents("php://input"), true);

        if (!$data || !isset($data["id"])) {
            echo ResponseService::failure_message("Missing Category ID");
            return;
        }

        $id = $data["id"];
        unset($data["id"]);

        $category = Category::find($mysqli, $id);
        if(!$category){
            echo ResponseService::failure_message("Category not found");
            return;
        }

        $updated = $category->update($mysqli, $data);
        if($updated){
           echo ResponseService::success_message("Category updated successfully");
        return; 
        }else{
            echo ResponseService::failure_message("Failed to update category");
        }
    }

    public function addCategory(){

        global $mysqli;

        $data = json_decode(file_get_contents("php://input"), true);

        if (!$data || !isset($data["name"])){
            echo ResponseService::failure_message("Missing required fields");
            return;
        }

        $category = Category::create($mysqli, $data);

        if(!$category){
            echo ResponseService::failure_message("Failed to add category");
            return;
        }
        echo ResponseService::success_message("Category added successfully");
    
    }

    public function getCategoryByArticleId(){
        global $mysqli;

        if(!isset($_GET["article_id"])){
        
            echo ResponseService::failure_message("Missing article id");
        }

        $article_id = $_GET["article_id"];

        $category = Category::getCategoryByArticleId($mysqli, $article_id);

        if(!$category){
            echo ResponseService::failure_message("Article not found");
            return;
        }

        echo ResponseService::success_response($category);  
    }

   
}
