<?php

namespace App\Repositories;

use App\Models\Sutra;
use App\Repositories\Contracts\SutraRepositoryInterface;

class SutraRepository implements SutraRepositoryInterface
{
    // protected $totalSutras = 53;

    public function all()
    {
        return Sutra::all();
    }

    public function sutraDelDia(array $sutrasVistos)
    {
        // Obtener los IDs de todos los sutras
        $todosLosSutras = Sutra::pluck('id')->toArray();
    
        // Filtrar los sutras que ya se han mostrado
        $sutrasRestantes = array_diff($todosLosSutras, $sutrasVistos);
    
        // Si todos los sutras han sido mostrados, reiniciar el ciclo
        if (empty($sutrasRestantes)) {
            // Reiniciar los sutras vistos y seleccionar uno al azar
            $sutrasRestantes = $todosLosSutras;
            $sutrasVistos = [];
        }
    
        // Elegir un sutra aleatorio de los restantes
        $sutraSeleccionado = Sutra::find($sutrasRestantes[array_rand($sutrasRestantes)]);
    
        // Agregar el sutra seleccionado a los sutras vistos
        $sutrasVistos[] = $sutraSeleccionado->id;
    
        return ['sutra' => $sutraSeleccionado, 'sutras_vistos' => $sutrasVistos];
    }
    
    
}
