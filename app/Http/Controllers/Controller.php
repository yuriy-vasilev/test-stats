<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Redis;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    private const STAT_NAME = 'countries-stat';

    public function add(string $countryCode): JsonResponse
    {
        /** @var Redis $redis */
        $redis = app('redis');
        $counter = (int)$redis->hGet(self::STAT_NAME, $countryCode) + 1;
        $redis->hSet(self::STAT_NAME, $countryCode, $counter);

        return response()->json();
    }

    public function list(): JsonResponse
    {
        /** @var Redis $redis */
        $redis = app('redis');

        return response()->json($redis->hGetAll(self::STAT_NAME));
    }
}
