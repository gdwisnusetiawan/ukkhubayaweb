<?php

namespace App\Http\Controllers;

use App\Committee;
use App\Event;
use App\Position;
use App\Member;
use App\CommitteeMember;
use Illuminate\Http\Request;

class CommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $events = Event::all();
        if ($request->has('event_id'))
        {
            $eventLast = $request->get('event_id');
        }
        else
        {
            $eventLast = Event::orderBy('year', 'desc')->first()->id;
        }
        $committees = Committee::where('event_id', $eventLast)
        ->get()
        ->sortBy(function($committee) {
            return $committee->position->order;
        });

        return view('committees.index', compact('committees', 'events', 'eventLast'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event)
    {
        $events = Event::orderBy('year', 'desc')->get();
        $positions = Position::all();
        $members = Member::all();
        $roles = CommitteeMember::getEnumValues();
        return view('committees.create', compact('event', 'events', 'positions', 'members', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function show(Committee $committee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function edit(Committee $committee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Committee $committee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Committee $committee)
    {
        //
    }
}
