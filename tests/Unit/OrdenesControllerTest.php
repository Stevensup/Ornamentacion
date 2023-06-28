<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\OrdenesController;
use App\Models\Orden;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Mockery;
use Tests\TestCase;

class OrdenesControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        // Insertar datos de prueba en la base de datos
        Orden::factory()->count(3)->create();

        // Hacer una solicitud GET a la ruta "ordenes.index"
        $response = $this->get(route('ordenes.index'));

        // Verificar que la respuesta tenga el código HTTP 200 (OK)
        $response->assertOk();

        // Verificar que la vista "ordenes.index" sea devuelta
        $response->assertViewIs('ordenes.index');

        // Verificar que la variable "ordenes" esté disponible en la vista
        $response->assertViewHas('ordenes');
    }

    public function testCreate()
    {
        // Mockear el modelo User para obtener los empleados
        $empleados = User::factory()->count(3)->create(['rol' => 2]);
        $this->mock(User::class, function ($mock) use ($empleados) {
            $mock->shouldReceive('where')
                ->with('rol', '=', 2)
                ->andReturn($empleados);
        });

        // Hacer una solicitud GET a la ruta "ordenes.create"
        $response = $this->get(route('ordenes.create'));

        // Verificar que la respuesta tenga el código HTTP 200 (OK)
        $response->assertOk();

        // Verificar que la vista "ordenes.create" sea devuelta
        $response->assertViewIs('ordenes.create');

        // Verificar que la variable "empleados" esté disponible en la vista
        $response->assertViewHas('empleados', $empleados);
    }

    public function testStore()
    {
        // Mockear el modelo Orden
        $ordenMock = Mockery::mock(Orden::class);
        $this->app->instance(Orden::class, $ordenMock);

        // Datos de prueba para la solicitud
        $data = [
            'nombre' => 'John Doe',
            'email' => 'john@example.com',
            'descripcion' => 'Descripción de prueba',
            'tipo_servicio' => 'Tipo de servicio de prueba',
            'id_empleado' => 1,
            'estado' => 1,
        ];

        // Hacer una solicitud POST a la ruta "ordenes.store" con los datos de prueba
        $response = $this->post(route('ordenes.store'), $data);

        // Verificar que se haya redirigido a la ruta "ordenes.index" después de crear la orden
        $response->assertRedirect(route('ordenes.index'));

        // Verificar que se haya llamado al método save() en el modelo Orden con los datos correctos
        $ordenMock->shouldReceive('save')->once()->with($data);

        // Verificar que se haya establecido correctamente el mensaje flash de éxito
        $this->assertSessionHas('success', 'Orden creada exitosamente');
    }

    public function testEdit()
    {
        // Mockear el modelo Orden para obtener la orden y los empleados
        $orden = Orden::factory()->create();
        $empleados = User::factory()->count(3)->create(['rol' => 2]);
        $this->mock(Orden::class, function ($mock) use ($orden) {
            $mock->shouldReceive('findOrFail')->with($orden->id)->andReturn($orden);
        });
        $this->mock(User::class, function ($mock) use ($empleados) {
            $mock->shouldReceive('where')
                ->with('rol', '=', 2)
                ->andReturn($empleados);
        });

        // Hacer una solicitud GET a la ruta "ordenes.edit" con el ID de la orden
        $response = $this->get(route('ordenes.edit', $orden->id));

        // Verificar que la respuesta tenga el código HTTP 200 (OK)
        $response->assertOk();

        // Verificar que la vista "ordenes.edit" sea devuelta
        $response->assertViewIs('ordenes.edit');

        // Verificar que las variables "orden" y "empleados" estén disponibles en la vista
        $response->assertViewHas('orden', $orden);
        $response->assertViewHas('empleados', $empleados);
    }

    public function testUpdate()
    {
        // Mockear el modelo Orden
        $ordenMock = Mockery::mock(Orden::class);
        $this->app->instance(Orden::class, $ordenMock);

        // Datos de prueba para la solicitud
        $data = [
            'nombre' => 'John Doe',
            'email' => 'john@example.com',
            'descripcion' => 'Descripción de prueba',
            'tipo_servicio' => 'Tipo de servicio de prueba',
            'id_empleado' => 1,
            'estado' => 1,
        ];

        // Hacer una solicitud PUT a la ruta "ordenes.update" con los datos de prueba
        $response = $this->put(route('ordenes.update', 1), $data);

        // Verificar que se haya redirigido a la ruta "ordenes.index" después de actualizar la orden
        $response->assertRedirect(route('ordenes.index'));

        // Verificar que se haya llamado al método findOrFail() en el modelo Orden con el ID correcto
        $ordenMock->shouldReceive('findOrFail')->once()->with(1);

        // Verificar que se haya llamado al método save() en el modelo Orden con los datos correctos
        $ordenMock->shouldReceive('save')->once()->with($data);

        // Verificar que se haya establecido correctamente el mensaje flash de éxito
        $this->assertSessionHas('success', 'Orden actualizada exitosamente');
    }

    public function testDestroy()
    {
        // Mockear el modelo Orden
        $ordenMock = Mockery::mock(Orden::class);
        $this->app->instance(Orden::class, $ordenMock);

        // Hacer una solicitud DELETE a la ruta "ordenes.destroy" con el ID de la orden
        $response = $this->delete(route('ordenes.destroy', 1));

        // Verificar que se haya redirigido a la ruta "ordenes.index" después de eliminar la orden
        $response->assertRedirect(route('ordenes.index'));

        // Verificar que se haya llamado al método findOrFail() en el modelo Orden con el ID correcto
        $ordenMock->shouldReceive('findOrFail')->once()->with(1);

        // Verificar que se haya llamado al método delete() en la orden
        $ordenMock->shouldReceive('delete')->once();

        // Verificar que se haya establecido correctamente el mensaje flash de éxito
        $this->assertSessionHas('success', 'Orden eliminada exitosamente');
    }
}
