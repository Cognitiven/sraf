<?php 

namespace Framework\Components;

use Framework\Exceptions\EndpointDoesNotExist;

class Dispatcher
{
    private $endpointNamespace = 'Api\\Endpoints';

    public function handle(string $endpointName, string $httpMethod)
    {
        // var_dump($this->endpointNamespace . $endpointName .  'Endpoint');
        if (!class_exists($this->endpointNamespace . $endpointName .  'Endpoint')) {
            throw new EndpointDoesNotExist('Endpoint not found!');
        }

        $endpoint = $this->endpointNamespace . $endpointName . 'Endpoint';
        $reflectionMethod = new \ReflectionMethod($endpoint, $httpMethod);

        return $reflectionMethod->invoke(new $endpoint);
    }
}

