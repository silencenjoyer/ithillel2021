<?php

require __DIR__ . '/Post.php';
require __DIR__ . '/PostBuilderInterface.php';
require __DIR__ . '/PostBuilder.php';
require __DIR__ . '/PostDirector.php';

$posts = [];

$builder = new PostBuilder();

$director = (new PostDirector())
    ->setBuilder($builder);

$posts[] = $director->createPostDogs();
$posts[] = $director->createPostCars();

var_dump($posts);