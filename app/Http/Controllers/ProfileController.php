<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
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
        $this->authorizeResource(Profile::class);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        $profile = Profile::all()->first();
        return view('profiles.index', compact('profile', 'contacts'));
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
        return view('profiles.edit', compact('profile'));
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
        $validatedData = $request->validate([
            'name' => [
                'required',
                'max:255',
                Rule::unique('profiles')->ignore($profile),
            ],
            'logo' => 'file|image|mimes:jpeg,png|max:1000',
            'established' => 'required|date|date_format:Y-m-d',
            'address' => 'required',
            'vision' => 'nullable',
            'mission' => 'nullable',
            'description' => 'nullable',
        ]);

        if($request->file('logo') != null)
        {
            $file = $request->file('logo');
            $name = $request->get('name');
            $name = $name.' Logo.'.$file->getClientOriginalExtension();
            $file->move('images/logos/', $name);
            // $path = $request->file('logo')->store('logos');
            $profile->logo = 'images/logos/'.$name;
        }
        $profile->name = $request->get('name');
        $profile->established = $request->get('established');
        $profile->address = $request->get('address');
        $profile->vision = $request->get('vision');
        $profile->mission = $request->get('mission');
        $profile->description = $request->get('description');
        $profile->save();

        return redirect('profiles')->with('status', 'Sukses mengubah data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();

        return redirect('profiles')->with('status', 'Sukses menghapus data.');
    }
}
