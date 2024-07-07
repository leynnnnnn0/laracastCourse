<?php

$container = new Container();

$container->bind('Database', function () {
    $config = require_once './config.php';
    return new Database($config['database']);
});

App::setContainer($container);