<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::find(1);
        return view('profiles.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profiles.create');
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
            'name' => 'required|max:255|unique:profiles',
            'logo' => 'required|file|image|mimes:jpeg,png|max:1000',
            'established' => 'required|date|date_format:Y-m-d',
            'address' => 'required',
            'vision' => 'nullable',
            'mission' => 'nullable',
            'history' => 'nullable',
            'description' => 'nullable',
        ]);

        $count = Profile::all()->count();
        if($count <= 0)
        {
            $file = $request->file('logo');
            $name = $request->get('name');
            $name = $name.' Logo.'.$file->getClientOriginalExtension();
            $file->move('images/logos/', $name);
            // $path = $request->file('logo')->store('logos');

            $profile = new Profile();
            $profile->name = $request->get('name');
            $profile->logo = 'images/logos/'.$name;
            $profile->established = $request->get('established');
            $profile->address = $request->get('address');
            $profile->vision = $request->get('vision');
            $profile->mission = $request->get('mission');
            $profile->history = $request->get('history');
            $profile->description = $request->get('description');
            $profile->save();

            return redirect('profiles')->with('status', 'Sukses menambah data.');
        }
        else
        {
            return redirect('profiles')->with('error', 'Gagal menambah data. Hanya boleh mengisi 1 data profile. Silahkan ubah data profile yang ada.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
