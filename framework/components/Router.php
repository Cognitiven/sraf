<?php 

namespace Framework\Components;

use Swoole\HTTP\Request;

class Router {

    private $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function getRequestURI() {
        return $this->convertUriToNamespacePath(
            $this->request->server['request_uri']
        ); 
    }

    public function getRequestMethod() {
        return  strtolower($this->request->server['request_method']);
    }

    private function convertUriToNamespacePath(string $uri): string {
        return implode('\\', array_map('ucfirst', explode('/', $uri)));
    }
}
