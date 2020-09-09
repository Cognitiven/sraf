<?php

namespace Framework;

use Swoole\HTTP\Request;
use Framework\Components\Router;


class Application {

    private $request;
    private $response;
    private $router;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->router = new Router();
    }

    public function main()
    {
        $this->router->resolve($this->request);
    }
}