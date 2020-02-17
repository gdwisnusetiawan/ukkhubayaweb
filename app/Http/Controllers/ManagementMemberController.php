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
    public function store(Request $request)
    {
        //
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
    public function edit(ManagementMembers $managementMembers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ManagementMembers  $managementMembers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManagementMembers $managementMembers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ManagementMembers  $managementMembers
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManagementMembers $managementMembers)
    {
        //
    }
}
