<?php

namespace App\Repositories\Contracts;

interface SutraRepositoryInterface
{
    public function all();
    public function sutraDelDia(array $sutrasVistos);
}