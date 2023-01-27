<?php

require_once '../vendor/autoload.php';

use Slim\Slim;

$released = [
    'topplepop' => [
        'portfolio' => [
            'https://www.youtube.com/embed/AJ24FYkqXjg' => 'topplepop-youtube-thumb.png',
            'screenshot1-large.jpg' => 'screenshot1-thumb.jpg',
            'screenshot2-large.jpg' => 'screenshot2-thumb.jpg',
            'screenshot3-large.jpg' => 'screenshot3-thumb.jpg',
            'screenshot4-large.jpg' => 'screenshot4-thumb.jpg',
        ],
    ],
    'inflatality' => [
        'portfolio' => [
            'https://www.youtube.com/embed/cs0UsYf9XEQ' => 'inflatality-youtube-thumb.png',
            'screenshot1-large.jpg' => 'screenshot1-thumb.png',
            'screenshot2-large.jpg' => 'screenshot2-thumb.png',
            'screenshot3-large.jpg' => 'screenshot3-thumb.png',
            'screenshot4-large.jpg' => 'screenshot4-thumb.png',
        ],
    ],
    'RoyalABC' => [
        'portfolio' => [
            'https://www.youtube.com/embed/krkyxlik1bg' => 'royalabc-youtube-thumb.jpg',
            'screenshot1-large.jpg' => 'screenshot1-thumb.jpg',
            'screenshot2-large.jpg' => 'screenshot2-thumb.jpg',
            'screenshot3-large.jpg' => 'screenshot3-thumb.jpg',
            'screenshot4-large.jpg' => 'screenshot4-thumb.jpg',
        ],
    ],
    'readysetgolf' => [
        'portfolio' => [
            'https://www.youtube.com/embed/6FOHZIvlilM' => 'readysetgolf-youtube-thumb.png',
            'screenshot1-large.png' => 'screenshot1-thumb.png',
            'screenshot2-large.png' => 'screenshot2-thumb.png',
            'screenshot3-large.png' => 'screenshot3-thumb.png',
            'screenshot4-large.png' => 'screenshot4-thumb.png',
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
];

$gamejams = [
    'hotf' => [
        'portfolio' => [
            'screenshot1-large.png' => 'screenshot1-thumb.png',
        ],
    ],
    'monstergotchi' => [
        'portfolio' => [
            'screenshot1-large.png' => 'screenshot1-thumb.png',
        ],
    ],
    'psycopath' => [
        'portfolio' => [
            'screenshot1-large.png' => 'screenshot1-thumb.png',
        ],
    ],
];

$app = new Slim();
$app->get('/', function () use ($app, $released, $gamejams) {
    // Prepare Twig
    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem(__DIR__ . '/views');
    $twig = new Twig_Environment($loader);
    // Render the descriptions
    foreach ($gamejams as $key => &$details) {
        $details['description'] = $twig->render('descriptions/' . $key . '.html.twig');
    }
    // Render the index page
    echo $twig->render(
        'index.html.twig',
        ['released' => $released,
        'gamejams' => $gamejams]
    );
});

$app->run();