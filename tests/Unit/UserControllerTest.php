<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testShowUsers()
    {
        $this->withoutExceptionHandling();

        // Crear usuarios de prueba en la base de datos
        User::factory()->count(3)->create();

        // Hacer una solicitud GET a la ruta "users"
        $response = $this->get('/users');

        // Verificar que la respuesta tenga el código HTTP 200 (OK)
        $response->assertStatus(Response::HTTP_OK);

        // Verificar que la vista "Administrator.usuarios" sea devuelta
        $response->assertViewIs('Administrator.usuarios');

        // Verificar que la variable "users" esté disponible en la vista
        $response->assertViewHas('users');
    }

    public function testDestroy()
    {
        // Crear un usuario de prueba en la base de datos
        $user = User::factory()->create();

        // Hacer una solicitud DELETE a la ruta "user.destroy" con el ID del usuario
        $response = $this->delete("/usuarios/{$user->id}");

        // Verificar que se haya redirigido a la ruta "users" después de eliminar al usuario
        $response->assertRedirect('/users');

        // Verificar que el usuario haya sido eliminado de la base de datos
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    public function testEdit()
    {
        // Crear un usuario de prueba en la base de datos
        $user = User::factory()->create();

        // Hacer una solicitud GET a la ruta "user.edit" con el ID del usuario
        $response = $this->get("/usuarios/{$user->id}/edit");

        // Verificar que la respuesta tenga el código HTTP 200 (OK)
        $response->assertStatus(Response::HTTP_OK);

        // Verificar que la vista "Administrator.editar-usuario" sea devuelta
        $response->assertViewIs('Administrator.editar-usuario');

        // Verificar que la variable "user" esté disponible en la vista
        $response->assertViewHas('user');
    }

    public function testUpdate()
    {
        // Crear un usuario de prueba en la base de datos
        $user = User::factory()->create();

        // Generar datos de prueba para actualizar el usuario
        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'edad' => 25,
            'genero' => 'masculino',
            'rol' => 2,
            'estado' => true,
        ];

        // Hacer una solicitud PUT a la ruta "user.update" con el ID del usuario y los datos de prueba
        $response = $this->put("/usuarios/{$user->id}", $data);

        // Verificar que se haya redirigido a la ruta "users" después de actualizar el usuario
        $response->assertRedirect('/users');

        // Verificar que el usuario haya sido actualizado en la base de datos
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => $data['name'],
            'email' => $data['email'],
            'edad' => $data['edad'],
            'genero' => $data['genero'],
            'rol' => $data['rol'],
            'estado' => $data['estado'],
        ]);
    }

    public function testCreate()
    {
        // Generar datos de prueba para crear un usuario
        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => 'password',
            'edad' => 25,
            'genero' => 'masculino',
            'rol' => 2,
        ];

        // Hacer una solicitud POST a la ruta "user.create" con los datos de prueba
        $response = $this->post('/users', $data);

        // Verificar que se haya redirigido a la ruta "users" después de crear el usuario
        $response->assertRedirect('/users');

        // Verificar que el usuario haya sido creado en la base de datos
        $this->assertDatabaseHas('users', [
            'name' => $data['name'],
            'email' => $data['email'],
            'edad' => $data['edad'],
            'genero' => $data['genero'],
            'rol' => $data['rol'],
            'estado' => false, // El estado predeterminado es false
        ]);

        // Verificar que la contraseña del usuario se haya hasheado correctamente
        $this->assertTrue(Hash::check($data['password'], User::where('email', $data['email'])->first()->password));
    }
}
