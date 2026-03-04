<?php

namespace App\Http\Controllers;

use App\Singletons\Logger;
use Illuminate\Http\Request;

class SingletonController extends Controller
{
    public function singleExample()
    {
        $instance = Logger::getInstance();
        // $instance2 = clone $instance;

        $instance->dumplog("New log....");

        // $logger1 = new Logger;
        // $this->logger->dumplog('Teste de log usando singleton');

        // // $logger2 = new Logger;
        // $this->logger->dumplog('Outro teste de log usando singleton');

        // // $logger3 = new Logger;
        // $this->logger->dumplog('Outro teste de log usando singleton');

        $anotherController = new OtherController;
        $anotherController->singleExample();

        return "Log has been dumped. Check your log files.";
    }
}
