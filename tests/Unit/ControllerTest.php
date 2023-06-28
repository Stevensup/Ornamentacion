<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tests\TestCase;

class ControllerTest extends TestCase
{
    /**
     * Verifica que el controlador redirija correctamente a la vista.
     */
    public function testIndex()
    {
        // Simula una solicitud HTTP GET al método index del controlador
        $response = $this->get('/');

        // Verifica que la respuesta tenga el código HTTP 200 (OK)
        $response->assertStatus(200);

        // Verifica que el controlador retorne la vista 'index'
        $response->assertViewIs('welcome');
    }


}
