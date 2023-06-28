<?php
namespace Tests\Unit\Controllers;

use App\Http\Controllers\InventarioController;
use App\Models\Inventario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class InventarioControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        // Insertar datos de prueba en la base de datos
        Inventario::factory()->count(3)->create();

        // Hacer una solicitud GET a la ruta "productos"
        $response = $this->get('productos');

        // Verificar que la respuesta tenga el código HTTP 200 (OK)
        $response->assertStatus(200);

        // Verificar que la vista "productos" sea devuelta
        $response->assertViewIs('productos');

        // Verificar que la variable "inventarios" esté disponible en la vista
        $response->assertViewHas('inventarios');
    }

    public function testCreate()
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('test.jpg');

        $data = [
            'nombreProducto' => 'Producto de prueba',
            'descripcion' => 'Descripción de prueba',
            'formFile' => $file,
            'cantidad' => 10,
            'precio_unitario' => 9.99,
        ];

        // Hacer una solicitud POST a la ruta "insertarProductos" con los datos de prueba
        $response = $this->post('insertarProductos', $data);

        // Verificar que se haya redirigido a la ruta "productos" después de crear el producto
        $response->assertRedirect('productos');

        // Verificar que el producto se haya guardado en la base de datos
        $this->assertDatabaseHas('inventarios', [
            'nombre' => 'Producto de prueba',
            'descripcion' => 'Descripción de prueba',
            'cantidad' => 10,
            'precio_unitario' => 9.99,
            'estado' => 1,
        ]);

        // Verificar que el archivo se haya almacenado correctamente en el almacenamiento
        Storage::disk('public')->assertExists($response->baseResponse->original['inventario']->url_imagen);
    }

    public function testInactiveProduct()
    {
        $inventario = Inventario::factory()->create();

        // Hacer una solicitud GET a la ruta "inactive/{id}" con el ID del producto
        $response = $this->get("inactive/{$inventario->id}");

        // Verificar que se haya realizado un dump and die (dd) con el ID del producto
        $response->assertSee($inventario->id);
    }
}
