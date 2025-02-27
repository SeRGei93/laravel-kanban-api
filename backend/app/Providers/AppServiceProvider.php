<?php

namespace App\Providers;

use App\Models\Card;
use App\Models\Column;
use App\Observers\CardObserver;
use App\Observers\ColumnObserver;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Настройка Rate Limiter для 'api'
        RateLimiter::for('api', function ($request) {
            return Limit::perMinute(60); // Лимит 60 запросов в минуту
        });

        // Observe deleting a column to delete all related cards
        Column::observe(ColumnObserver::class);

        // Observe adding a new card to increment the position accordingly
        Card::observe(CardObserver::class);

        // Make every nested array a collection, easier to work with
        Collection::macro('recursive', function () {
            return $this->map( function($value) {
                if (is_array($value) || is_object($value))
                {
                    return collect($value)->recursive();
                }

                return $value;
            });
        });
    }
}
