<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Services\SutraService;
use Illuminate\Http\Request;

class SutraController extends Controller
{
    protected $SutraService;

    public function __construct(SutraService $SutraService)
    {
        $this->SutraService = $SutraService;
    }

    public function index()
    {
        $Sutras = $this->SutraService->getAllSutras();
        return response()->json($Sutras);
    }
}
