<?php

require_once '../vendor/autoload.php';

use Slim\Slim;

$data = [
    'inflatality' => [
        'portfolio' => [
            'https://www.youtube.com/embed/cs0UsYf9XEQ' => 'inflatality-youtube-thumb.png',
            'screenshot1-large.jpg' => 'screenshot1-thumb.png',
            'screenshot2-large.jpg' => 'screenshot2-thumb.png',
            'screenshot3-large.jpg' => 'screenshot3-thumb.png',
            'screenshot4-large.jpg' => 'screenshot4-thumb.png',
        ],
    ],
    'catscape' => [
        'portfolio' => [
            'https://www.youtube.com/embed/6w1A4s_VLng' => 'catscape-youtube-thumb.png',
            'screenshot1-large.png' => 'screenshot1-thumb.png',
            'screenshot2-large.png' => 'screenshot2-thumb.png',
            'screenshot3-large.png' => 'screenshot3-thumb.png',
            'screenshot4-large.png' => 'screenshot4-thumb.png',
        ],
    ],
    'hotf' => [
        'portfolio' => [
            'https://www.youtube.com/embed/gCjd_n46_L4' => 'hotf-youtube-thumb.png',
            'screenshot1-large.png' => 'screenshot1-thumb.png',
            'screenshot2-large.png' => 'screenshot2-thumb.png',
            'screenshot3-large.png' => 'screenshot3-thumb.png',
            'screenshot4-large.png' => 'screenshot4-thumb.png',
        ],
    ],
    'monstergotchi' => [
        'portfolio' => [
            'https://www.youtube.com/embed/zzMJdFnt7DY' => 'monstergotchi-youtube-thumb.png',
            'screenshot1-large.png' => 'screenshot1-thumb.png',
            'screenshot2-large.jpg' => 'screenshot2-thumb.png',
            'screenshot3-large.png' => 'screenshot3-thumb.png',
            'screenshot4-large.png' => 'screenshot4-thumb.png',
        ],
    ],
    'psycopath' => [
        'portfolio' => [
            'https://www.youtube.com/embed/uozZ0vvY9zg' => 'psycopath-youtube-thumb.png',
            'screenshot1-large.png' => 'screenshot1-thumb.png',
            'screenshot2-large.png' => 'screenshot2-thumb.png',
            'screenshot3-large.png' => 'screenshot3-thumb.png',
            'screenshot4-large.png' => 'screenshot4-thumb.png',
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