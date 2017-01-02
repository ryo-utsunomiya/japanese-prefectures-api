<?php namespace ryo511\JapanesePrefecturesApi;

use Silex\Application;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\TwigServiceProvider;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Application();
$app['debug'] = true;

// Setup
$app->register(new MonologServiceProvider(), [
    'monolog.logfile' => 'php://stderr',
]);
$app->register(new TwigServiceProvider(), [
    'twig.path' => __DIR__ . '/views',
]);

// Handle request
$app->get('/', function () use ($app) {
    /** @var \Twig_Environment $twig */
    $twig = $app['twig'];
    return $twig->render('index.twig', ['prefectures' => json_decode(loadJson(), true)]);
});

$app->run();

function loadJson()
{
    return file_get_contents(__DIR__ . '/../prefectures.json');
}
