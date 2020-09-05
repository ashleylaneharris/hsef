<?php

# this is relative to the root index.php
require 'server/vendor/autoload.php';

$app = new \Slim\Slim();

$app->get('/ping', function() use ($app) {
  $app->response->write('pong');
});

$app->run();