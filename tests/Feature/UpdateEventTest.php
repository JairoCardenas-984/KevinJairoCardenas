<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;
use App\Models\Event;

class UpdateEventTest extends TestCase
{
    use RefreshDatabase;

    protected $event;

    public function SetUp(): void
    {
        parent::setUp();
        $this ->event = Event::create([
        'name'=> 'Evento a ser actualizado',
            'featured'=>'evento3.png',
            'date'=> Carbon::now(),
            'time'=> '21:00:00',
            'location'=>'Ubicacion sin actualizar',  
        ]);
    }

    public function test_example()
{
    $updateData = [
        'name' => 'Conferencia de YouDevs',
        'featured' => 'meme.png',
        'date' => '2026-05-25',
        'time' => '12:00:00',
        'location' => 'El Santiago',
    ];

    // ACT: Asegúrate de pasar $updateData directamente aquí
    $response = $this->put('/events/' . $this->event->id, $updateData);

    // ASSERT
    $response->assertStatus(200);
    $this->assertDatabaseHas('events', $updateData);
}
}
