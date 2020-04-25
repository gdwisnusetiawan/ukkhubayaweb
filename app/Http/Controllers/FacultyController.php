<?php

namespace App\Http\Controllers;

use App\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
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
        $this->authorizeResource(Faculty::class);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::all();
        $colors = Faculty::colors();
        return view('faculties.index', compact('faculties', 'colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = Faculty::colors();
        return view('faculties.create', compact('colors'));
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
            'name' => 'required|unique:faculties',
            'color' => 'required',
            'icon' => 'required|starts_with:fas fa-, far fa-, fab fa-',
        ]);

        $faculty = new Faculty();
        $faculty->name = $request->get('name');
        $faculty->color = $request->get('color');
        $faculty->icon = $request->get('icon');
        $faculty->save();

        return redirect('faculties')->with('status', 'Sukses menambah data.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit(Faculty $faculty)
    {
        $colors = Faculty::colors();
        return view('faculties.edit', compact('faculty', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'color' => 'required',
            'icon' => 'required',
        ]);

        $faculty->name = $request->get('name');
        $faculty->color = $request->get('color');
        $faculty->icon = $request->get('icon');
        $faculty->save();

        return redirect('faculties')->with('status', 'Sukses mengubah data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty)
    {
        $faculty->delete();

        return redirect('faculties')->with('status', 'Sukses menghapus data.');
    }
}
