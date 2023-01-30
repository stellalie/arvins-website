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
    'shootyballz' => [
        'portfolio' => [
            'screenshot1-large.gif' => 'screenshot1-thumb.gif',
        ],
        'link' => 'https://arvz.itch.io/shooty-ballz',
        'title' => 'Shooty Ballz'
    ],
    'tangerine' => [
            'portfolio' => [
                'screenshot1-large.gif' => 'screenshot1-thumb.gif',
            ],
            'link' => 'https://arvz.itch.io/tangerino',
            'title' => 'Tangerine Massacre'
        ],
    'spms2077' => [
                'portfolio' => [
                    'screenshot1-large.gif' => 'screenshot1-thumb.gif',
                ],
                'link' => 'https://arvz.itch.io/spaceship2077',
                'title' => 'Spaceship Power Management Simulator 2077'
            ],
    'kcf' => [
                'portfolio' => [
                    'screenshot1-large.gif' => 'screenshot1-thumb.png',
                ],
                'link' => 'https://globalgamejam.org/2022/games/kfc-krazy-frickin-chicken-7',
                'title' => 'Krazy Chicken Frenzy'
            ],
     'poseidoom' => [
                 'portfolio' => [
                     'screenshot1-large.gif' => 'screenshot1-thumb.jpg',
                 ],
                 'link' => 'https://globalgamejam.org/2017/games/poseidoom',
                 'title' => 'Poseidoom'
             ],
    'godofchance' => [
            'portfolio' => [
                'screenshot1-large.gif' => 'screenshot1-thumb.jpg',
            ],
            'link' => 'https://arvz.itch.io/god-of-chance',
            'title' => 'God of Chance'
        ],
    'hotf' => [
        'portfolio' => [
            'screenshot1-large.png' => 'screenshot1-thumb.png',
        ],
        'link' => '',
        'title' => 'Heart of the Forest'
    ],
    'monstergotchi' => [
        'portfolio' => [
            'screenshot1-large.png' => 'screenshot1-thumb.png',
        ],
        'link' => 'https://globalgamejam.org/2016/games/monstergotchi',
        'title' => 'Monstergotchi'
    ],
    'psycopath' => [
        'portfolio' => [
            'screenshot1-large.png' => 'screenshot1-thumb.png',
        ],
        'link' => 'https://globalgamejam.org/2014/games/psyco-path',
        'title' => 'Psycopath'
    ],
];

$app = new Slim();
$app->get('/', function () use ($app, $released, $gamejams) {
    // Prepare Twig
    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem(__DIR__ . '/views');
    $twig = new Twig_Environment($loader);
    // Render the descriptions
    foreach ($released as $key => &$details) {
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