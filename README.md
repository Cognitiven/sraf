# SRAF
Swoole REST API framework - A REST API framework based on php swoole framework

## Usage

### Normal 

Linux users

    #!/bin/bash
    pecl install swoole

Mac users

    brew install php 
    #!/bin/bash
    pecl install swoole

### Docker

Build docker container

    docker build -f ./Dockerfile -t swoole-php .

MacOS/Linux

    docker run --rm -p 9501:9501 -v $(pwd):/app -w /app swoole-php server.php

Windows
    docker run --rm -p 9501:9501 -v C:/YOUR_DIR/:/app -w /app swoole-php server.php

