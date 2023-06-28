<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    /**
     * Verifica que se retorne la vista 'welcome' en el método index.
     *
     * @return void
     */
    public function testIndex()
    {
        // Simula la autenticación del usuario
        $user = Auth::loginUsingId(1);

        // Crea una instancia del controlador
        $controller = new HomeController();

        // Llama al método index del controlador
        $response = $controller->index();

        // Verifica que la respuesta sea una instancia de la vista 'welcome'
        $this->assertInstanceOf(\Illuminate\Contracts\Support\Renderable::class, $response);
        $this->assertEquals('welcome', $response->getName());
    }
}
