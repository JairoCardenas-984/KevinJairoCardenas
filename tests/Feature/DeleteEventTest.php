<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Event;
use Carbon\Carbon;

class DeleteEventTest extends TestCase
{
    use RefreshDatabase;

    public function test_example(): void
    {
       //arranque
        $event = Event::create(
        [
            'name'=> 'Conferencia de Youdevs',
            'featured'=>'meme.png',
            'date'=> Carbon::now(),
            'time'=> '12:00:00',
            'location'=>'El Santiago',
        ]);
        // act
$response = $this->delete('/events/' . $event->id);

// assert
$response->assertStatus(204);
$this->assertDatabaseMissing('events', ['id' => $event->id]);
    }
}
