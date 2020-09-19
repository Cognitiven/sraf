<?php 

namespace Api\Endpoints;

use Framework\Abstractions\BaseEndpoint;

class TestEndpoint extends BaseEndpoint {
    
    public function get() {
        var_dump('test');
    }
}