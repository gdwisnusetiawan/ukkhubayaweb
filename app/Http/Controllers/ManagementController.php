<?php

namespace App\Http\Controllers;

use App\Management;
use App\Period;
use App\Position;
use App\Member;
use App\ManagementMember;
use Illuminate\Http\Request;

class ManagementController extends Controller
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
        $this->authorizeResource(Management::class);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $periods = Period::all();
        if ($request->has('period_id'))
        {
            $periodLast = $request->get('period_id');
        }
        else
        {
            $periodLast = Period::orderBy('year_begin', 'desc')->first()->id;
        }
        $managements = Management::where('period_id', $periodLast)
        ->get()
        ->sortBy(function($management) {
            return $management->position->order;
        });

        return view('managements.index', compact('managements', 'periods', 'periodLast'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Period $period)
    {
        $members = Member::all();
        $roles = ManagementMember::getEnumValues();
        $positions = Position::all();
        $periods = Period::orderBy('year_begin', 'desc')->get();
        return view('managements.create', compact('period', 'periods', 'positions', 'members', 'roles'));
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
            'position_id' => 'required|exists:positions,id',
            'job' => 'required',
            'information' => 'nullable',
            'member' => 'required|exists:members,id|array|min:1',
            'role' => 'required|in:none,head,staff',
        ]);

        // Retrieve management by period and position, or create it with the job and information
        $management = Management::firstOrCreate(
            ['period_id' => $request->get('period_id'), 'position_id' => $request->get('position_id')],
            ['job' => $request->get('job'), 'information' => $request->get('information')]
        );

        // Attach a member with the role to the management
        foreach($request->get('member') as $member)
        {
            if(!$management->members->contains($member))
            {
                $management->members()->attach($member, ['role' => $request->get('role')]);
                $management->save();
            }
        }

        $period = Period::find($request->get('period_id'));
        return redirect('managements')->with('status', 'Sukses menambah data.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Management  $management
     * @return \Illuminate\Http\Response
     */
    public function show(Management $management)
    {
        $head = $management->members()->wherePivotIn('role', ['none','head'])->first();
        $staffs = $management->members()->where('role','staff')->get();
        return view('managements.show', compact('management', 'head', 'staffs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Management  $management
     * @return \Illuminate\Http\Response
     */
    public function edit(Management $management)
    {
        return view('managements.edit', compact('management'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Management  $management
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Management $management)
    {
        $validatedData = $request->validate([
            'period_id' => 'required|exists:periods,id',
            'position_id' => 'required|exists:positions,id',
            'job' => 'required',
            'information' => 'nullable',
        ]);

        $management->job = $request->get('job');
        $management->information = $request->get('information');
        $management->save();

        $period = Period::find($request->get('period_id'));
        $request->session()->flash('status', 'Sukses mengubah data.');
        return redirect()->route('periods.show', $period);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Management  $management
     * @return \Illuminate\Http\Response
     */
    public function destroy(Management $management)
    {
        $period = $management->period->id;
        foreach ($management->members as $member) {
            $management->members()->detach($member);
        }
        $management->delete();

        return redirect()->route('periods.show', $period)->with('status', 'Sukses menghapus data.');
    }
}
