<?php

namespace App\Http\Controllers;

use App\ManagementMember;
use App\Management;
use App\Member;
use Illuminate\Http\Request;

class ManagementMemberController extends Controller
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
    public function create(Management $management)
    {
        $roles = ManagementMember::getEnumValues();
        $members = Member::all();
        return view('management-member.create', compact('management', 'roles', 'members'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Management $management)
    {
        $validatedData = $request->validate([
            'management_id' => 'required|exists:managements,id',
            'member' => 'required|exists:members,id|array|min:1',
            'role' => 'required|in:none,head,staff',
        ]);

        // Attach a member with the role to the management
        foreach($request->get('member') as $member)
        {
            if(!$management->members->contains($member))
            {
                $management->members()->attach($member, ['role' => $request->get('role')]);
                $management->save();
            }
        }
        $request->session()->flash('status', 'Sukses menambah data.');
        return redirect()->route('managements.show', $management);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ManagementMembers  $managementMembers
     * @return \Illuminate\Http\Response
     */
    public function show(ManagementMembers $managementMembers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ManagementMembers  $managementMembers
     * @return \Illuminate\Http\Response
     */
    public function edit(Management $management, Member $member)
    {
        foreach ($management->members as $item)
        {
            if($item->id == $member->id)
            {
                $role = $item->pivot->role;
            }
        }
        $roles = ManagementMember::getEnumValues();
        return view('management-member.edit', compact('management', 'member', 'role', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ManagementMembers  $managementMembers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Management $management, Member $member)
    {
        $validatedData = $request->validate([
            'management_id' => 'required|exists:managements,id',
            'member_id' => 'required|exists:members,id',
            'role' => 'required|in:none,head,staff',
        ]);

        $management->members()->updateExistingPivot($request->get('member_id'), ['role' => $request->get('role')]);
        return redirect('managements')->with('status', 'Sukses mengubah data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ManagementMembers  $managementMembers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Management $management, Member $member)
    {
        $management->members()->detach($member);
        return redirect('managements')->with('status', 'Sukses menghapus data.');
    }
}
