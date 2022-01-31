<?php

namespace App\Repositories;

use malkusch\lock\mutex\PHPRedisMutex;
use Redis;

class RedisCountryStatisticsRepository implements CountryStatisticsRepositoryInterface
{
    private const STAT_NAME = 'country-statistics';

    private $redis;

    public function __construct(Redis $redis)
    {
        $this->redis = $redis;
    }

    public function increase(string $countryCode): void
    {
        $lock = new PHPRedisMutex([$this->redis], 'lock-' . self::STAT_NAME);
        $lock->synchronized(function () use ($countryCode) {
            $counter = (int)$this->redis->hGet(self::STAT_NAME, $countryCode) + 1;
            $this->redis->hSet(self::STAT_NAME, $countryCode, $counter);
        });
    }

    public function getList(): array
    {
        return $this->redis->hGetAll(self::STAT_NAME);
    }
}
