<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Event;
use Carbon\Carbon;

class ReadEventTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_display_list_of_events(): void
    {
        //arrange
        Event::create([
            'name'=> 'Evento 1',
            'featured'=>'meme.png',
            'date'=> Carbon::now(),
            'time'=> '12:00:00',
            'location'=>'El Santiago',
        ]);

        Event::create([
            'name'=> 'Evento 2',
            'featured'=>'meme.png',
            'date'=> Carbon::now(),
            'time'=> '12:00:00',
            'location'=>'El Santiago',
        ]);

        //act
        $response=$this->get('/events');

        //assert
         $response->assertStatus(200);
         $response->assertSee('Evento 1');
         $response->assertSee('Evento 2');
        

    }
}
