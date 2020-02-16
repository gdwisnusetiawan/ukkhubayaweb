<?php

namespace App\Http\Controllers;

use App\CommitteeMember;
use App\Committee;
use App\Member;
use Illuminate\Http\Request;

class CommitteeMemberController extends Controller
{
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
    public function create()
    {
        //
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
    public function update(Request $request, CommitteeMember $committeeMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CommitteeMember  $committeeMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommitteeMember $committeeMember)
    {
        //
    }
}
