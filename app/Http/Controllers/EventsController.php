<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Acaronlex\LaravelCalendar\Calendar;
use Illuminate\Support\Facades\Auth;

/**
 * @Middleware("auth")
 */
class EventsController extends Controller
{

    /**
     * @Get("/events", as="events.calendar")
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {

        $events = [];
        $db =  Event::query()->where('from' , '>', now()->subMonths(3))->get();

        foreach ($db as $event) {
            $name = $event->name;
            if ($event->comment) {
                $name .= '(' . $event->comment. ')';
            }
            if ($event->location) {
                $name .= ' | ' . $event->location;
            }
            $events[] = Calendar::event(
                $name, //event title
                false, //full day event?
                $event->from, //start time (you can also use Carbon instead of DateTime)
                $event->until ?? $event->from->addHours(2), //end time (you can also use Carbon instead of DateTime)
                $event->id //optionally, you can specify an event ID
            );
        }

        $calendar = new Calendar();
        $calendar->addEvents($events)
            ->setOptions([
                'locale' => 'de',
                'firstDay' => 1,
                'displayEventTime' => true,
                'selectable' => true,
                'initialView' => 'timeGridWeek',
                'headerToolbar' => [
                    'end' => 'today prev,next dayGridMonth timeGridWeek timeGridDay'
                ],
                'buttonText' => [
                      'today' =>  'heute',
                      'month' =>    'Monat',
                      'week'  =>   'Woche',
                      'day'   =>    'Tag',
                      'list'  =>    'Liste'
                    ],
            ]);
        $calendar->setId('1');
        $calendar->setCallbacks([
            'select' => 'function(selectionInfo){}',
            'eventClick' => 'function(event){}'
        ]);

        return view('layouts.events', compact('calendar'));
    }
}
