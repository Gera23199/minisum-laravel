<?php

namespace Tests\Feature;

use App\Models\Operacion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OperacionTest extends TestCase
{
    use RefreshDatabase;

    public function test_pagina_suma_carga_correctamente(): void
    {
        $response = $this->get('/suma');

        $response->assertStatus(200);
        $response->assertSee('MiniSum Laravel');
    }

    public function test_puede_guardar_una_operacion(): void
    {
        $response = $this->post('/suma', [
            'nombre' => 'Gerardo',
            'numero_uno' => 10,
            'numero_dos' => 5,
        ]);

        $response->assertRedirect('/suma');

        $this->assertDatabaseHas('operacions', [
            'nombre' => 'Gerardo',
            'numero_uno' => 10,
            'numero_dos' => 5,
            'resultado' => 15,
        ]);
    }

    public function test_no_permite_datos_vacios(): void
    {
        $response = $this->post('/suma', []);

        $response->assertSessionHasErrors([
            'nombre',
            'numero_uno',
            'numero_dos',
        ]);
    }
}