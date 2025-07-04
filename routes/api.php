<?php 

$apis = [
    '/articles'         => ['controller' => 'ArticleController', 'method' => 'getAllArticles'],
    '/delete_articles'         => ['controller' => 'ArticleController', 'method' => 'deleteAllArticles'],

    '/login'         => ['controller' => 'AuthController', 'method' => 'login'],
    '/register'         => ['controller' => 'AuthController', 'method' => 'register'],

];