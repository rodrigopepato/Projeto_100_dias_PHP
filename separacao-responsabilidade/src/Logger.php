<?php

namespace App;

use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger as MonologLogger;

class Logger
{
    protected MonologLogger $logger;

    public function __construct()
    {
        $this->logger = new MonologLogger('app');
        $this->logger->pushHandler(
            new StreamHandler(__DIR__ . '/../storage/logs/app.log', Level::Debug)
        );
    }

    public function write($message): void
    {
        $this->logger->debug($message);
    }
}
