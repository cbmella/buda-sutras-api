<?php

namespace App\Repositories;

use App\Models\Sutra;
use App\Repositories\Contracts\SutraRepositoryInterface;

class SutraRepository implements SutraRepositoryInterface
{
    public function all()
    {
        return Sutra::all();
    }
}
