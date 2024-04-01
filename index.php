<?php

require_once './Router.php';

$router = new Router();

$router->resolve($_SERVER['REQUEST_URI']);
