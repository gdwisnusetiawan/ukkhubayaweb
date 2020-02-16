<?php

namespace App\Http\Controllers;

use App\Member;
use App\Contact;
use Illuminate\Http\Request;

class ContactMemberController extends Controller
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
    public function store(Request $request, Member $member)
    {
        $validatedData = $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'link' => 'required|max:255',
        ]);

        if(!$member->contacts->contains($request->get('contact_id')))
        {
            $member->contacts()->attach($request->get('contact_id'), ['link' => $request->get('link')]);
            $request->session()->flash('status', 'Sukses menambah data.');
        }
        else
        {
            $request->session()->flash('error', 'Gagal menambah data. Tidak dapat menambah jenis kontak yang sama.');
        }
        return redirect()->route('members.show', $member);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member, Contact $contact)
    {
        foreach ($member->contacts as $item)
        {
            if($item->id == $contact->id)
            {
                $link = $item->pivot->link;
            }
        }
        return view('member-contact.edit', compact('member', 'contact', 'link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member, Contact $contact)
    {
        $validatedData = $request->validate([
            'member_id' => 'required|exists:members,id',
            'contact_id' => 'required|exists:contacts,id',
            'link' => 'required|max:255',
        ]);

        $member->contacts()->updateExistingPivot($request->get('contact_id'), ['link' => $request->get('link')]);
        $request->session()->flash('status', 'Sukses mengubah data.');
        return redirect()->route('members.show', $member);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Member $member, Contact $contact)
    {
        $member->contacts()->detach($contact);
        $request->session()->flash('status', 'Sukses menghapus data.');
        return redirect()->route('members.show', $member);
    }
}
