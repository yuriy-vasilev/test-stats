<?php

namespace App\Repositories;

interface CountryStatisticsRepositoryInterface
{
    public function increase(string $countryCode): void;

    public function getList(): array;
}
