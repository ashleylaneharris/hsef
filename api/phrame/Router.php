<?php

namespace Phrame;

require 'iRouter.php';

class Router implements iRouter {

  private $GET;
  private $POST;

  public function __construct() {}

  public function get($route, $controller) {
    $this->GET[$route] = $controller;
  }

  public function post($route, $controller) {
    $this->POST[$route] = $controller;
  }

  public function handle($req, $res) {
    $method = strtoupper($req->requestMethod);
    $map = $this->{$method};
    $handler = $map[$req->requestUri];
    $handler($req, $res);
  }
}