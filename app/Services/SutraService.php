<?php

namespace App\Services;

use App\Repositories\Contracts\SutraRepositoryInterface;

class SutraService
{
    protected $sutraRepository;

    public function __construct(SutraRepositoryInterface $sutraRepository)
    {
        $this->sutraRepository = $sutraRepository;
    }

    public function getAllSutras()
    {
        return $this->sutraRepository->all();
    }

    public function getSutraDelDia(array $sutrasVistos)
    {
        return $this->sutraRepository->sutraDelDia($sutrasVistos);
    }
}
