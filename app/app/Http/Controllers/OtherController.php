<?php

namespace App\Http\Controllers;

use App\Singletons\Logger;
use FontLib\Table\Type\loca;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    public function singleExample () {
        $logger = Logger::getInstance();

        // $logger1 = new Logger;
        $logger->dumplog('Teste de log usando singleton no outro controller');

        // return "Log has been dumped. Check your log files.";
    }
}
