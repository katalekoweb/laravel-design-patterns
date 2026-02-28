<?php

namespace App\Providers;

use App\Interfaces\ExpenseInterface;
use App\Models\Expense;
use App\Observers\ExpenseObserver;
use App\Repositories\ExpenseRepository;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ExpenseInterface::class, ExpenseRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);
        // Expense::observe(ExpenseObserver::class);
    }
}
