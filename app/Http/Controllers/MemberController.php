<?php

namespace App\Http\Controllers;

use App\Member;
use App\Faculty;
use App\Contact;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::all();
        $types = Member::getEnumValues();
        return view('members.create', compact('faculties', 'types'));
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
            'id' => 'required|max:255|unique:members',
            'name' => 'required|max:255|unique:members',
            'year' => 'required|digits:4|integer',
            'type' => 'required',
        ]);

        $member = new Member();
        $member->id = $request->get('id');
        $member->name = $request->get('name');
        $member->year = $request->get('year');
        $member->type = $request->get('type');
        if($request->get('faculty') != 'none')
        {
            $member->faculty()->associate($request->get('faculty'));
        }
        $member->save();

        return redirect('members')->with('status', 'Sukses menambah data.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        $contacts = Contact::all();
        return view('members.show', compact('member', 'contacts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $faculties = Faculty::all();
        $types = Member::getEnumValues();
        return view('members.edit', compact('member','faculties','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $validatedData = $request->validate([
            'id' => 'required|max:255',
            'name' => 'required|max:255',
            'year' => 'required|digits:4|integer',
            'type' => 'required',
        ]);

        $member->id = $request->get('id');
        $member->name = $request->get('name');
        $member->year = $request->get('year');
        $member->type = $request->get('type');
        if($request->get('faculty') != 'none')
        {
            $member->faculty()->associate($request->get('faculty'));
        }
        else
        {
            $member->faculty()->dissociate();
        }
        $member->save();

        return redirect('members')->with('status', 'Sukses mengubah data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();

        return redirect('members')->with('status', 'Sukses menghapus data.');
    }
}
