<?php 
require("../connection/connection.php");
require("../models/Article.php");

$articles = array(
    array(
        "name" => "The Rise of Quantum Computing",
        "category_id" => 1,
        "author" => "Alice Johnson",
        "description" => "Explores how quantum computers are changing the future of tech."
    ),
    array(
        "name" => "10 Steps to Improve Your Mental Health",
        "category_id" => 2,
        "author" => "Dr. Sarah Lee",
        "description" => "Practical advice for boosting mental well-being in everyday life."
    ),
    array(
        "name" => "How Startups Can Survive a Recession",
        "category_id" => 3,
        "author" => "Mark Thompson",
        "description" => "Strategies for new businesses to stay resilient during economic downturns."
    ),
    array(
        "name" => "Top Travel Destinations for 2025",
        "category_id" => 4,
        "author" => "Emily Rivera",
        "description" => "A curated list of the most exciting places to visit this year."
    ),
    array(
        "name" => "New Discoveries in Dark Matter Research",
        "category_id" => 5,
        "author" => "Dr. Kevin Huang",
        "description" => "A deep dive into recent findings that could change our understanding of the universe."
    ),
    array(
        "name" => "Online Learning Trends in 2025",
        "category_id" => 6,
        "author" => "Rachel Kim",
        "description" => "How technology is reshaping the education landscape."
    ),
    array(
        "name" => "Election 2025: What You Need to Know",
        "category_id" => 7,
        "author" => "David Greene",
        "description" => "A breakdown of the candidates, key issues, and voting changes."
    ),
    array(
        "name" => "The Return of Vinyl Records",
        "category_id" => 8,
        "author" => "Samantha Ortiz",
        "description" => "Why physical music is making a surprising comeback in the digital age."
    ),
    array(
        "name" => "The Future of Artificial Intelligence",
        "category_id" => 1,
        "author" => "Daniel Brooks",
        "description" => "How AI is evolving and what it means for society and business."
    ),
    array(
        "name" => "The Science Behind Intermittent Fasting",
        "category_id" => 2,
        "author" => "Dr. Nina Patel",
        "description" => "What studies say about the benefits and risks of intermittent fasting."
    ),
    array(
        "name" => "Breaking the Myths About Nutrition",
        "category_id" => 2,
        "author" => "Laura Mendes",
        "description" => "Debunks common misconceptions about healthy eating and dieting."
    ),
    array(
        "name" => "The Impact of Sleep on Mental Health",
        "category_id" => 2,
        "author" => "Dr. Omar Khan",
        "description" => "Explores the link between sleep quality and psychological well-being."
    )
);

$i = 0;
while ($i < count($articles)){
    $article = $articles[$i];
    Article::create($mysqli, $article);
    $i++;
}
