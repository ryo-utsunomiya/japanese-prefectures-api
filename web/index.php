<?php namespace ryo511\JapanesePrefecturesApi;

use Silex\Application;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Symfony\Component\HttpFoundation\Response;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Application();
$app['debug'] = true;

// Setup
$app->register(new MonologServiceProvider(), array(
    'monolog.logfile' => 'php://stderr',
));
$app->register(new TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/views',
));

// Handle request
$app->get('/', function () use ($app) {
    return $app['twig']->render('index.twig');
});

$app->get('/json', function () use ($app) {
    $json = file_get_contents(__DIR__ . '/../prefectures.json');
    return new Response($json);
});

$app->run();
