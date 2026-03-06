<?php

namespace App\Http\Controllers;

use App\Services\RoleGreetingService;
use Illuminate\Http\Request;

class GreetingController extends Controller
{
    public function __construct(public RoleGreetingService $role_greeting_service) {}
    public function showGreeting(string $role)
    {
        return $this->role_greeting_service->getGreeting($role);
        // $role = "admin";

        # admin | editor | publisher | default

        // if ($role === "admin") {
        //     return "Hey admin you hae full access";
        // } elseif ($role === "editor") {
        //     return "Hey Editor! you have edit access";
        // } elseif ($role === "publisher") {
        //     return "Hey publisher! You have publish access";
        // } else {
        //     return "Hey User! You have viewer access";
        // }
    }
}
