<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EventController extends Controller
{

    public function index():View
    {
        $events =Event::all();
         return view('events.index',['events'=> $events]);   
    }

    public function store(StoreEventRequest $request):RedirectResponse
    {
        $eventData = $request->all();

        Event::create($eventData);

        return redirect()->route('events.index'); 
    }
    

public function update(\Illuminate\Http\Request $request, Event $event): \Illuminate\Http\JsonResponse
{
    $updateData = $request->validate([
        'name' => 'required|string|max:60',
        'featured' => 'required|string|max:50',
        'date' => 'required|date',
        'time' => 'required|date_format:H:i:s',
        'location' => 'required|string|max:60',
    ]);

    $event->update($updateData);

    
    return response()->json($event, 200);
}

public function destroy(Event $event)
{
    

    $event->delete();

    
    return response()->noContent();
}


}
}
