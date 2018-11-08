<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function (\Slim\Container $c) {
    $settings = $c->get('settings')['renderer'];
    return new Twig_Environment(
        new Twig_Loader_Filesystem($settings['template_path'])
    );
};

$container['database'] = function (\Slim\Container $c) {
    $settings = $c->get('settings')['database'];
    return \ParagonIE\EasyDB\Factory::create(
        $settings['dsn'],
        $settings['username'],
        $settings['password'],
        $settings['options']
    );
};
