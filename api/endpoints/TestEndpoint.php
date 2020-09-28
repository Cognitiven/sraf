<?php 

namespace Api\Endpoints;

use Framework\Components\Database;
use Framework\Abstractions\BaseEndpoint;

class TestEndpoint extends BaseEndpoint {
    
    public function get() {
        // var_dump('test');

        $options = [
            //required
            'username' => 'root',
            'database' => 'test',
            //optional
            'password' => 'nikilach123',
            'type' => 'mysql',
            'charset' => 'utf8',
            'host' => '127.0.0.1',
            'port' => '3306'
        ];

        $db = new Database($options);
        // phpinfo(INFO_MODULES);

        var_dump(
            $db->count('select * from artists;')
        );
    }
}