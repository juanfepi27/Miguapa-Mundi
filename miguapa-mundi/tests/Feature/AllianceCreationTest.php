<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AllianceCreationTest extends TestCase
{

    use DatabaseTransactions;

    public function test_create_alliance()
    {
        
        $user =  User::first();

        $this->actingAs($user);

        // Hacer una solicitud para crear una alianza
        $response = $this->post('/alliance/save', [
            'name' => 'Alliance test',
            'image' => UploadedFile::fake()->image('file1.png', 600, 600),
            'founder' => 1,
            'moderator' => 1,
            'country_id' => $user->getBoughtCountries()->first()->getId(),
        ]);

        // Verificar que la alianza se haya creado correctamente
        $response->assertStatus(302); // Redirección después de la creación
        $response->assertRedirect('/alliance');
        $this->assertDatabaseHas('alliances', ['name' => 'Alliance test']);
    }

}
