<?php
require_once("Model.php");

class Category extends Model{

    private int $id; 
    private string $name; 
    
    protected static string $table = "categories";

    public function __construct(array $data){
        $this->id = $data["id"];
        $this->name = $data["name"];
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name){
        $this->name = $name;
    }
    
    public function toArray(){
        return [$this->id, $this->name];
    }

    public static function getCategoryByArticleId(mysqli $mysqli, $id){
        $sql = "
            SELECT categories.name AS category_name
            FROM articles
            JOIN categories ON articles.category_id = categories.id
            WHERE articles.id = ?;
        ";

        $query = $mysqli->prepare($sql);
        $query->bind_param("i", $id);

        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows === 0) return null;

        $category= $result->fetch_assoc();
        return $category;
    }
    
}
