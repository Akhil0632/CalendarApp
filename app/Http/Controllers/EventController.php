<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::query();

        if ($request->filled('filter')) {
            $filter = $request->input('filter');

            switch ($filter) {
                case 'day':
                    $query->whereDate('start_time', Carbon::today()->toDateString());
                    break;
                case 'week':
                    $query->whereBetween('start_time', [
                        Carbon::now()->startOfWeek()->toDateString(),
                        Carbon::now()->endOfWeek()->toDateString()
                    ]);
                    break;
                case 'month':
                    $query->whereMonth('start_time', Carbon::now()->month);
                    break;
                case 'year':
                    $query->whereYear('start_time', Carbon::now()->year);
                    break;
                default:
                    // No filter or invalid filter
                    break;
            }
        }
        $events = $query->paginate(10);
        return view('events.index', compact('events'));
    }
    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after_or_equal:start_time',
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'nullable|date|after_or_equal:start_time',
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }

    public function calendar()
    {
        $events = Event::all()->map(function ($event) {
            return [
                'title' => $event->title,
                'start' => $event->start_time->toIso8601String(),
                'end' => $event->end_time ? $event->end_time->toIso8601String() : null,
            ];
        });

        return view('events.calendar', compact('events'));
    }

    public function getEvents()
    {
        $events = Event::all()->map(function ($event) {
            return [
                'title' => $event->title,
                'start' => $event->date . 'T' . $event->time,
                'start' => $event->date . 'T' . $event->time

            ];
        });

        return response()->json($events);
    }

}
