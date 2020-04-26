<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Contact;
use Illuminate\Http\Request;

class ContactProfileController extends Controller
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
    public function store(Request $request, Profile $profile)
    {
        $validatedData = $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'link' => 'required|max:255',
        ]);

        if(!$profile->contacts->contains($request->get('contact_id')))
        {
            $profile->contacts()->attach($request->get('contact_id'), ['link' => $request->get('link')]);
            $request->session()->flash('status', 'Sukses menambah data.');
        }
        else
        {
            $request->session()->flash('error', 'Gagal menambah data. Tidak dapat menambah jenis kontak yang sama.');
        }
        return redirect()->route('profiles.index');
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
    public function edit(Profile $profile, Contact $contact)
    {
        foreach ($profile->contacts as $item)
        {
            if($item->id == $contact->id)
            {
                $link = $item->pivot->link;
            }
        }
        return view('profile-contact.edit', compact('profile', 'contact', 'link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile, Contact $contact)
    {
        $validatedData = $request->validate([
            'profile_id' => 'required|exists:profiles,id',
            'contact_id' => 'required|exists:contacts,id',
            'link' => 'required|max:255',
        ]);

        $profile->contacts()->updateExistingPivot($request->get('contact_id'), ['link' => $request->get('link')]);
        $request->session()->flash('status', 'Sukses mengubah data.');
        return redirect()->route('profiles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Profile $profile, Contact $contact)
    {
        $profile->contacts()->detach($contact);
        $request->session()->flash('status', 'Sukses menghapus data.');
        return redirect()->route('profiles.index');
    }
}
