<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function store (Request $Request)
    {
        $eventData =  $Request->all();
        Event::create($eventData);
        return redirect()->route('events.index');
    }
}
