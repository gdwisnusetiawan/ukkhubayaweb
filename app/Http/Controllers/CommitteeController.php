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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->authorizeResource(Committee::class);
    }
    
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
        $validatedData = $request->validate([
            'event_id' => 'required|exists:events,id',
            'position_id' => 'required|exists:positions,id',
            'job' => 'required',
            'information' => 'nullable',
            'member' => 'required|exists:members,id|array|min:1',
            'role' => 'required|in:none,head,staff',
        ]);

        // Retrieve committee by event and position, or create it with the job and information
        $committee = Committee::firstOrCreate(
            ['event_id' => $request->get('event_id'), 'position_id' => $request->get('position_id')],
            ['job' => $request->get('job'), 'information' => $request->get('information')]
        );
        // Attach a member with the role to the committee
        foreach($request->get('member') as $member)
        {
            if(!$committee->members->contains($member))
            {
                $committee->members()->attach($member, ['role' => $request->get('role')]);
                $committee->save();
            }
        }

        $event = Event::find($request->get('event_id'));
        return redirect('committees')->with('status', 'Sukses menambah data.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function show(Committee $committee)
    {
        $head = $committee->members()->wherePivotIn('role', ['none','head'])->first();
        $staffs = $committee->members()->where('role','staff')->get();
        return view('committees.show', compact('committee', 'head', 'staffs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function edit(Committee $committee)
    {
        return view('committees.edit', compact('committee'));
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
        $validatedData = $request->validate([
            'event_id' => 'required|exists:events,id',
            'position_id' => 'required|exists:positions,id',
            'job' => 'required',
            'information' => 'nullable',
        ]);

        $committee->job = $request->get('job');
        $committee->information = $request->get('information');
        $committee->save();

        $event = Event::find($request->get('event_id'));
        return redirect('committees')->with('status', 'Sukses mengubah data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Committee $committee)
    {
        $event = $committee->event->id;
        foreach ($committee->members as $member) {
            $committee->members()->detach($member);
        }
        $committee->delete();

        return redirect()->route('events.show', $event)->with('status', 'Sukses menghapus data.');
    }
}
