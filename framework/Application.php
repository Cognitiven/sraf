<?php

namespace Framework;

use Swoole\HTTP\Request;
use Framework\Components\Router;
use Framework\Components\Dispatcher;

class Application {

    private $request;
    private $response;
    private $router;
    private $dispatcher;


    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->router = new Router($request);
        $this->dispatcher = new Dispatcher();
    }

    public function main()
    { 
        $this->dispatcher->handle(
            $this->router->getRequestURI(),  
            $this->router->getRequestMethod()
        );        
    }
}