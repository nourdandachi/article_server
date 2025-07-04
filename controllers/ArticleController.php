<?php 

require(__DIR__ . "/../models/Article.php");
require(__DIR__ . "/../connection/connection.php");
require(__DIR__ . "/../services/ArticleService.php");
require(__DIR__ . "/../services/ResponseService.php");

class ArticleController{
    
    public function getAllArticles(){
        global $mysqli;

        if(!isset($_GET["id"])){
            $articles = Article::all($mysqli);
            $articles_array = ArticleService::articlesToArray($articles); 
            echo ResponseService::success_response($articles_array);
            return;
        }

        $id = $_GET["id"];
        $article = Article::find($mysqli, $id)->toArray();
        echo ResponseService::success_response($article);
        return;
    }

    public function deleteAllArticles(){
        global $mysqli;

        if(!isset($_GET["id"])){
            $deleting = Article::deleteAll($mysqli);
            if(!$deleting){
                echo ResponseService::failure_message("Error in deleting articles");
                return;
            }

            echo ResponseService::success_response("Articles deleted successfully");
            return;
            
        }

        $id = $_GET["id"];
        $article = Article::find($mysqli, $id);

        if(!$article){
            echo ResponseService::failure_message("Article not found");
            return;
        }
        $article->delete($mysqli);
        echo ResponseService::success_message("Article deleted successfully");
        return;
    }

    public function updateArticle(){
        global $mysqli;

        $data = json_decode(file_get_contents("php://input"), true);

        if (!$data || !isset($data["id"])) {
            echo ResponseService::failure_message("Missing Article ID");
            return;
        }

        $id = $data["id"];
        unset($data["id"]);

        $article = Article::find($mysqli, $id);
        if(!$article){
            echo ResponseService::failure_message("Article not found");
            return;
        }

        $updated = $article->update($mysqli, $data);
        if(!$updated){
            echo ResponseService::failure_message("Failed to update article");
            return; 
        }

        echo ResponseService::success_message("Article updated successfully");
        
        
    }

    public function addArticle(){

        global $mysqli;

        $data = json_decode(file_get_contents("php://input"), true);

        if (!$data || 
            !isset($data["name"]) ||
            !isset($data["category_id"]) ||
            !isset($data["author"]) ||
            !isset($data["description"])
        ){
            echo ResponseService::failure_message("Missing required fields");
            return;
        }

        $article = Article::create($mysqli, $data);

        if(!$article){
            echo ResponseService::failure_message("Failed to add article");
            return;
        }
        echo ResponseService::success_message("Article added successfully");
    
    }

    public function getArticlesByCategoryId(){
        global $mysqli;

        if(!isset($_GET["category_id"])){
        
            echo ResponseService::failure_message("Missing category id");
        }

        $category_id = $_GET["category_id"];

        $articles = Article::where($mysqli, "category_id", $category_id);

        if(!$articles){
            echo ResponseService::failure_message("Articles not found");
            return;
        }

        echo ResponseService::success_response(ArticleService::articlesToArray($articles));  
    }

}
