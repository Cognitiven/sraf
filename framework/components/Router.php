<?php 

namespace Framework\Components;

use Swoole\HTTP\Request;

class Router {

    public function __construct()
    {
        
    }

    public function resolve(Request $request)
    {
        var_dump($request->server['request_uri']);
    }
}