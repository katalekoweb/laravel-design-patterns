<?php

namespace App\Singletons;

use Exception;
use Illuminate\Support\Facades\Log;

class Logger
{
    private static $instance = null;

    private function __construct() {}

    private function __clone() {
        throw new Exception("Clone not allowed");
    }

    private function __wakeup()
    {
        throw new \Exception('Not allowed');
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function dumplog($message)
    {
        $objectId = spl_object_id($this);

        Log::info("Logger instance ID: $objectId - Message: $message");
    }
}
