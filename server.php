<?php

require __DIR__ . '/vendor/autoload.php';

use Swoole\HTTP\Server;
use Framework\Application;
use Framework\Components\EndpointAutoloader;
use Framework\Exceptions\EndpointDoesNotExist;


$http = new Server("0.0.0.0", 9501);

$http->on('start', function ($server) {
    echo "Swoole http server is started at http://127.0.0.1:9501\n";
});

$http->on('request', function ($request, $response) {
    try {
        $application = new Application($request);
        $application->main();
    }
    catch(EndpointDoesNotExist $exception) {
        var_dump($exception);
    }
});

$http->start();