<?php
require_once("Model.php");

class Article extends Model{

    private int $id; 
    private string $name; 
    private int $category_id;
    private string $author; 
    private string $description; 
    
    
    protected static string $table = "articles";

    public function __construct(array $data){
        $this->id = $data["id"];
        $this->name = $data["name"];
        $this->category_id = $data["category_id"];
        $this->author = $data["author"];
        $this->description = $data["description"];
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getCategoryId(): int {
        return $this->category_id;
    }

    public function getAuthor(): string {
        return $this->author;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function setCategoryId(int $category_id){
        $this->category_id = $category_id;
    }

    public function setAuthor(string $author){
        $this->author = $author;
    }

    public function setDescription(string $description){
        $this->description = $description;
    }

    public function toArray(){
        return [$this->id, $this->name, $this->category_id, $this->author, $this->description];
    }
    
}
