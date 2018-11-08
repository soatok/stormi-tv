<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Soatok\StormiTV\RequestHandler\{
    HomePage
};

// Routes

$app->get('/[{name}]', HomePage::class);
