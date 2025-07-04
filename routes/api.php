<?php 

$apis = [
    '/articles'         => ['controller' => 'ArticleController', 'method' => 'getAllArticles'],
    '/delete_articles'         => ['controller' => 'ArticleController', 'method' => 'deleteAllArticles'],
    '/update_article'      => ['controller' => 'ArticleController', 'method' => 'updateArticle'],
    '/add_article'      => ['controller' => 'ArticleController', 'method' => 'addArticle'],
    '/articles_by_category_id'      => ['controller' => 'ArticleController', 'method' => 'getArticlesByCategoryId'],

    '/categories'         => ['controller' => 'CategoryController', 'method' => 'getAllCategories'],
    '/delete_categories'         => ['controller' => 'CategoryController', 'method' => 'deleteAllCategories'],
    '/update_category'      => ['controller' => 'CategoryController', 'method' => 'updateCategory'],
    '/add_category'      => ['controller' => 'CategoryController', 'method' => 'addCategory'],
    '/category_by_article_id'      => ['controller' => 'CategoryController', 'method' => 'getCategoryByArticleId'],

];