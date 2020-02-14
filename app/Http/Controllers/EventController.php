<?php

namespace App\Http\Controllers;

use App\Event;
use App\Period;
use App\Program;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('period_id'))
        {
            $periodLast = $request->get('period_id');
        }
        else
        {
            $periodLast = Period::orderBy('year_begin', 'desc')->first()->id;
        }
        $events = Event::where('period_id', $periodLast)
        ->get()
        ->sortBy(function($event) {
            return $event->period->year_begin;
        });
        $periods = Period::all();
        // $events = Event::all();
        return view('events.index', compact('events', 'periods', 'periodLast'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $periods = Period::all();
        $programs = Program::all();
        return view('events.create', compact('periods', 'programs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'period_id' => 'required|exists:periods,id',
            'program_id' => 'required|exists:programs,id',
            'date_begin' => 'required|date|date_format:Y-m-d',
            'date_end' => 'nullable|date|date_format:Y-m-d',
            'time_begin' => 'nullable|date_format:H:i',
            'time_end' => 'nullable|date_format:H:i|after:time_begin',
            'location' => 'required',
            'description' => 'required',
        ]);

        $event = new Event();
        $event->period()->associate($request->get('period_id'));
        $event->program()->associate($request->get('program_id'));
        $event->year = Carbon::parse($request->get('date_begin'))->year;
        $event->date_begin = $request->get('date_begin');
        $event->date_end = $request->get('date_end');
        $event->time_begin = $request->get('time_begin');
        $event->time_end = $request->get('time_end');
        $event->location = $request->get('location');
        $event->description = $request->get('description');
        $event->save();

        return redirect('events')->with('status', 'Sukses menambah data.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $periods = Period::all();
        $programs = Program::all();
        return view('events.edit', compact('periods', 'programs', 'event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'period_id' => 'required|exists:periods,id',
            'program_id' => 'required|exists:programs,id',
            'date_begin' => 'required|date|date_format:Y-m-d',
            'date_end' => 'nullable|date|date_format:Y-m-d',
            'time_begin' => 'nullable|date_format:H:i',
            'time_end' => 'nullable|date_format:H:i|after:time_begin',
            'location' => 'required',
            'description' => 'required',
        ]);

        $event->period()->associate($request->get('period_id'));
        $event->program()->associate($request->get('program_id'));
        $event->year = Carbon::parse($request->get('date_begin'))->year;
        $event->date_begin = $request->get('date_begin');
        $event->date_end = $request->get('date_end');
        $event->time_begin = $request->get('time_begin');
        $event->time_end = $request->get('time_end');
        $event->location = $request->get('location');
        $event->description = $request->get('description');
        $event->save();

        return redirect('events')->with('status', 'Sukses mengubah data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
