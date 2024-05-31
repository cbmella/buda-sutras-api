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


    public function sutraDelDia(Request $request)
    {
        $sutrasVistos = $request->input('sutras_vistos', '[]');
    
        // Asegúrate de que sutras_vistos sea una cadena antes de decodificar
        if (is_string($sutrasVistos)) {
            $sutrasVistosArray = json_decode($sutrasVistos, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                return response()->json(['error' => 'Invalid JSON input'], 400);
            }
        } elseif (is_array($sutrasVistos)) {
            $sutrasVistosArray = $sutrasVistos;
        } else {
            return response()->json(['error' => 'Invalid input'], 400);
        }
    
        // Obtener el sutra del día y los sutras vistos actualizados
        $result = $this->SutraService->getSutraDelDia($sutrasVistosArray);
        $sutra = $result['sutra'];
        $sutrasVistosArray = $result['sutras_vistos'];
    
        return response()->json([
            'sutra' => $sutra,
            'sutras_vistos' => $sutrasVistosArray
        ]);
    }
    
    
}
