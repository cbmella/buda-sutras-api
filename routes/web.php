<?php

use Illuminate\Support\Facades\DB;

$router->get('/', function () use ($router) {
    try {
        $router->app->version();
        $pdo = DB::connection()->getPdo();

        if ($pdo) {
            return 'Conexión a la base de datos exitosa' . ' y versión de lumen: ' . $router->app->version();
        } else {
            return 'No se pudo establecer la conexión a la base de datos';
        }
    } catch (\Exception $e) {
        return 'Error de conexión a la base de datos: ' . $e->getMessage() . ' y versión de lumen: ' . $router->app->version();
    }
});

$router->group(['prefix' => 'api/v1'], function () use ($router) {
    $router->get('/', function () {
        return response()->json(['message' => 'Sutras API', 'status' => 'Connected']);
    });
    $router->get('sutras', 'SutraController@index');
});
