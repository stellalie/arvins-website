<?php

require_once '../vendor/autoload.php';

use Slim\Slim;

$data = [
    'inflatality' => [
        'portfolio' => [
            'https://www.youtube.com/embed/Z3UvhXilpPY' => 'inflatality-youtube-thumb.png',
            'screenshot1-large.jpg' => 'screenshot1-thumb.png',
            'screenshot2-large.jpg' => 'screenshot2-thumb.png',
            'screenshot3-large.jpg' => 'screenshot3-thumb.png',
            'screenshot4-large.jpg' => 'screenshot4-thumb.png',
        ],
    ],
    'shootyballz' => [
        'portfolio' => [
            'https://www.youtube.com/embed/FiqoYaXU1W8' => 'youtube-thumb.png',
            'Screenshot1.jpg' => 'Screenshot1-thumb.jpg',
            'Screenshot2.jpg' => 'Screenshot2-thumb.jpg',
            'Screenshot3.png' => 'Screenshot3-thumb.png',
            'Screenshot4.png' => 'Screenshot4-thumb.png',
        ],
    ],
    'catscape' => [
        'portfolio' => [
            'https://www.youtube.com/embed/zRuFa8wdIno' => 'catscape-youtube-thumb.png',
            'screenshot1-large.png' => 'screenshot1-thumb.png',
            'screenshot2-large.png' => 'screenshot2-thumb.png',
            'screenshot3-large.png' => 'screenshot3-thumb.png',
            'screenshot4-large.png' => 'screenshot4-thumb.png',
        ],
    ],
    'readysetgolf' => [
        'portfolio' => [
            'https://www.youtube.com/embed/6FOHZIvlilM' => 'readysetgolf-youtube-thumb.png',
            'Screenshot1.png' => 'Screenshot1-thumb.png',
            'Screenshot2.png' => 'Screenshot2-thumb.png',
            'Screenshot4.png' => 'Screenshot4-thumb.png',
            'Screenshot6.png' => 'Screenshot6-thumb.png',
        ],
    ],
];

$app = new Slim();
$app->get('/', function () use ($app, $data) {
    // Prepare Twig
    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem(__DIR__ . '/views');
    $twig = new Twig_Environment($loader);
    // Render the descriptions
    foreach ($data as $key => &$details) {
        $details['description'] = $twig->render('descriptions/' . $key . '.html.twig');
    }
    // Render the index page
    echo $twig->render(
        'index.html.twig',
        ['data' => $data]
    );
});
$app->run();