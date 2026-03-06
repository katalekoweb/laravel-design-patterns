<?php

namespace App\Services\GreetingStrategies;

use App\Interfaces\GreetingInterface;

class DefaultGreeting implements GreetingInterface
{
    public function greet(): string
    {
        return "Hey user! you have viewer acess!";
    }
}
