<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Redis;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    private const STAT_NAME = 'stat2';

    public function add(string $countryCode): JsonResponse
    {
        /** @var Redis $redis */
        $redis = app('redis');
        $counter = (int)$redis->hGet('stat2', $countryCode) + 1;
        $redis->hSet('stat2', $countryCode, $counter);

        return response()->json();
    }

    public function list(): JsonResponse
    {
        /** @var Redis $redis */
        $redis = app('redis');

        return response()->json($redis->hGetAll(self::STAT_NAME));
    }
}
