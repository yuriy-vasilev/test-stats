<?php

namespace App\Http\Controllers;

use App\Repositories\CountryStatisticsRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    private $repo;

    public function __construct(CountryStatisticsRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function update(string $countryCode): JsonResponse
    {
        $this->repo->increase($countryCode);

        return response()->json();
    }

    public function index(): JsonResponse
    {
        return response()->json($this->repo->getList());
    }
}
