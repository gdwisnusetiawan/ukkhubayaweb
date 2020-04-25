<?php

namespace App\Http\Controllers;

use App\CommitteeMember;
use App\Committee;
use App\Member;
use Illuminate\Http\Request;

class CommitteeMemberController extends Controller
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
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Committee $committee)
    {
        $this->authorize('create', CommitteeMember::class);
        $roles = CommitteeMember::getEnumValues();
        $members = Member::all();
        return view('committee-member.create', compact('committee', 'roles', 'members'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Committee $committee)
    {
        $this->authorize('create', CommitteeMember::class);
        $validatedData = $request->validate([
            'committee_id' => 'required|exists:committees,id',
            'member' => 'required|exists:members,id|array|min:1',
            'role' => 'required|in:none,head,staff',
        ]);

        // Attach a member with the role to the committee
        foreach($request->get('member') as $member)
        {
            if(!$committee->members->contains($member))
            {
                $committee->members()->attach($member, ['role' => $request->get('role')]);
                $committee->save();
            }
        }
        $request->session()->flash('status', 'Sukses menambah data.');
        return redirect()->route('committees.show', $committee);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CommitteeMember  $committeeMember
     * @return \Illuminate\Http\Response
     */
    public function show(CommitteeMember $committeeMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CommitteeMember  $committeeMember
     * @return \Illuminate\Http\Response
     */
    public function edit(Committee $committee, Member $member)
    {
        $this->authorize('update', $committee->committeeMember($member));
        foreach ($committee->members as $item)
        {
            if($item->id == $member->id)
            {
                $role = $item->pivot->role;
            }
        }
        $roles = CommitteeMember::getEnumValues();
        return view('committee-member.edit', compact('committee', 'member', 'role', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CommitteeMember  $committeeMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Committee $committee, Member $member)
    {
        $this->authorize('update', $committee->committeeMember($member));
        $validatedData = $request->validate([
            'committee_id' => 'required|exists:committees,id',
            'member_id' => 'required|exists:members,id',
            'role' => 'required|in:none,head,staff',
        ]);

        $committee->members()->updateExistingPivot($request->get('member_id'), ['role' => $request->get('role')]);
        return redirect('committees')->with('status', 'Sukses mengubah data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CommitteeMember  $committeeMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(Committee $committee, Member $member)
    {
        $this->authorize('delete', $committee->committeeMember($member));
        $committee->members()->detach($member);
        return redirect('committees')->with('status', 'Sukses menghapus data.');
    }
}
