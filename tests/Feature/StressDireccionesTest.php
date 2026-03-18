<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Direccion;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StressDireccionesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test de estrés: generar 5000 direcciones y verificar la cantidad.
     */
    public function test_genera_5000_direcciones_para_estres()
    {
        // Crear 5000 registros de prueba en la base de datos
        Direccion::factory()->count(5000)->create();

        // Verificar que efectivamente se crearon 5000 registros
        $this->assertEquals(5000, Direccion::count());
    }
}