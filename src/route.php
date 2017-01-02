<?php

require_once '../vendor/autoload.php';

use Slim\Slim;

$data = [
    "inflatality" => [
        "https://www.youtube.com/embed/cs0UsYf9XEQ" => "screenshot1-thumb.png",
        "screenshot1-large.jpg" => "screenshot1-thumb.png",
        "screenshot2-large.jpg" => "screenshot2-thumb.png",
        "screenshot3-large.jpg" => "screenshot3-thumb.png",
        "screenshot4-large.jpg" => "screenshot4-thumb.png",
    ]
];

$app = new Slim();
$app->get('/', function () use ($app, $data) {
    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem(__DIR__ . '/views');
    $twig = new Twig_Environment($loader);
    echo $twig->render(
        'index.html.twig',
        ['data' => $data]
    );
});
$app->run();