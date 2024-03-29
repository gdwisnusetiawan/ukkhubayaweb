<?php

namespace App\Http\Controllers;

use App\Member;
use App\Faculty;
use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MemberController extends Controller
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
        $this->authorizeResource(Member::class);
    }
    
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
            'place_of_birth' => 'nullable',
            'date_of_birth' => 'nullable',
            'original_address' => 'nullable',
            'residence_address' => 'nullable',
            'hobby' => 'nullable',
        ]);

        $member->id = $request->get('id');
        $member->name = $request->get('name');
        $member->year = $request->get('year');
        $member->type = $request->get('type');
        $member->place_of_birth = $request->get('place_of_birth');
        $member->date_of_birth = $request->get('date_of_birth');
        $member->original_address = $request->get('original_address');
        $member->residence_address = $request->get('residence_address');
        $member->hobby = $request->get('hobby');
        // if($request->get('faculty') != 'none')
        // {
        //     $member->faculty()->associate($request->get('faculty'));
        // }
        $member->save();

        return redirect('members')->with('status', 'Sukses mengubah data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Member $member)
    {
        $validatedData = $request->validate([
            'id' => [
                'required',
                Rule::in([$member->id]),
            ],
            'sure' => 'required'
        ]);
        $member->user()->dissociate(auth()->user());
        $member->save();
        auth()->user()->delete();

        return redirect('/');
    }
}
