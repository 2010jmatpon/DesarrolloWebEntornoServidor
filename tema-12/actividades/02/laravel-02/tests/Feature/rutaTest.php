<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class rutaTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_test(): void
    {
        $response = $this->get('/test');

        $response->assertStatus(200);
        $response->assertSee('Juan María, Desarrollo Web Entorno Cliente, 2DAW, Prueba');
    }
    public function test_api_user(): void
    {
        $response = $this->get('/api/user');

        $response->assertStatus(200);
        $response->assertSee('No temo a los ordenadores; lo que temo es quedarme sin ellos');
    }
    public function test_nom_ape(): void
    {
        $response = $this->get('/juan/paco');

        $response->assertStatus(200);
        $response->assertSee('Hola soy juan paco');
    }
    public function test_user_view(): void
    {
        $response = $this->get('/user/view/2');

        $response->assertStatus(200);
        $response->assertSee('View: 2');
    }
    public function test_selec(): void
    {
        $response = $this->get('/players/select/1/5');

        $response->assertStatus(200);
        $response->assertSee('Seleccionar jugadores desde el: 1 hasta el 5');
    }
}
