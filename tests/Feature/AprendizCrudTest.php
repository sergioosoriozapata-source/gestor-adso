<?php

namespace Tests\Feature;

use App\Models\Aprendiz;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AprendizCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_index(): void
    {
        $response = $this->get('/aprendices');
        $response->assertStatus(200);
    }

    public function test_can_view_create(): void
    {
        $response = $this->get('/aprendices/create');
        $response->assertStatus(200);
    }

    public function test_can_store_aprendiz(): void
    {
        $response = $this->post('/aprendices', [
            'nombre' => 'Carlos Perez',
            'documento' => '1098765432',
            'correo' => 'carlos@test.com',
            'ficha_id' => 2693627,
        ]);

        $response->assertRedirect('/aprendices');
        $this->assertDatabaseHas('aprendices', [
            'documento' => '1098765432',
            'correo' => 'carlos@test.com',
        ]);
    }

    public function test_validation_fails_on_store(): void
    {
        $response = $this->post('/aprendices', []);

        $response->assertSessionHasErrors(['nombre', 'documento', 'correo']);
    }

    public function test_can_view_edit(): void
    {
        $aprendiz = Aprendiz::create([
            'nombre' => 'Ana Gomez',
            'documento' => '1122334455',
            'correo' => 'ana@test.com',
        ]);

        $response = $this->get("/aprendices/{$aprendiz->id}/edit");
        $response->assertStatus(200);
    }

    public function test_can_update_aprendiz(): void
    {
        $aprendiz = Aprendiz::create([
            'nombre' => 'Ana Gomez',
            'documento' => '1122334455',
            'correo' => 'ana@test.com',
        ]);

        $response = $this->put("/aprendices/{$aprendiz->id}", [
            'nombre' => 'Ana Maria Gomez',
            'documento' => '1122334455',
            'correo' => 'ana.update@test.com',
        ]);

        $response->assertRedirect('/aprendices');
        $this->assertDatabaseHas('aprendices', [
            'id' => $aprendiz->id,
            'nombre' => 'Ana Maria Gomez',
            'correo' => 'ana.update@test.com',
        ]);
    }

    public function test_can_destroy_aprendiz(): void
    {
        $aprendiz = Aprendiz::create([
            'nombre' => 'Pedro Parra',
            'documento' => '9988776655',
            'correo' => 'pedro@test.com',
        ]);

        $response = $this->delete("/aprendices/{$aprendiz->id}");

        $response->assertRedirect('/aprendices');
        $this->assertDatabaseMissing('aprendices', [
            'id' => $aprendiz->id,
        ]);
    }
}
