<?php

namespace App\Providers;

use App\Repositories\CountryStatisticsRepositoryInterface;
use App\Repositories\RedisCountryStatisticsRepository;
use Illuminate\Support\ServiceProvider;
use Redis;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            CountryStatisticsRepositoryInterface::class,
            function ($app) {
                $redis = new Redis();
                $redis->connect(config('database.redis.default.host'));

                return new RedisCountryStatisticsRepository($redis);
            }
        );
    }
}
