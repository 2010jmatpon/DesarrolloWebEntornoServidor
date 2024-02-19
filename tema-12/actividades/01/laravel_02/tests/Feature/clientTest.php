<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class clientTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_edit(): void
    {
        $response = $this->get('/clients/edit/5');

        $response->assertStatus(200);
        $response->assertSee('Editar Clientes: 5');
    }
    public function test_delete(): void
    {
        $response = $this->get('/clients/delete/1/3');

        $response->assertStatus(200);
        $response->assertSee('Eliminar de los clientes: 1 hasta el 3');
    }
    public function test_new(): void
    {
        $response = $this->get('/clients/new');

        $response->assertStatus(200);
        $response->assertSee('Vista Nuevo Cliente');
    }
    public function test_show(): void
    {
        $response = $this->get('/clients/show/27');

        $response->assertStatus(200);
        $response->assertSee('Se va a mostrar al cliente: 27');
    }
}
