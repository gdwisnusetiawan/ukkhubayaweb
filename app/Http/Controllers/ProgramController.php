<?php

namespace App\Http\Controllers;

use App\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProgramController extends Controller
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
        $this->authorizeResource(Program::class);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::all();
        return view('programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programs.create');
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
            'name' => 'required|max:255|unique:programs',
            'logo' => 'required|file|image|mimes:jpeg,png|max:1000|dimensions:ratio=1/1'
        ]);

        // $path = $request->file('logo')->store('logos');
        $file = $request->file('logo');
        $name = $request->get('name');
        $name = $name.' Logo.'.$file->getClientOriginalExtension();
        $file->move('images/logos/', $name);

        $program = new Program();
        $program->name = $request->get('name');
        $program->logo = 'images/logos/'.$name;
        $program->save();

        return redirect('programs')->with('status', 'Sukses menambah data.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        return view('programs.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                'max:255',
                Rule::unique('programs')->ignore($program),
            ],
            'logo' => 'required|file|image|mimes:jpeg,png|max:1024|dimensions:ratio=1/1'
        ]);

        $program->name = $request->get('name');
        // $path = $request->file('logo')->store('logos');
        $file = $request->file('logo');
        if ($file->isValid()) {
            unlink($program->logo);
            $name = $request->get('name');
            $filename = $name.' Logo.'.$file->getClientOriginalExtension();
            $file->move('images/logos/', $filename);
            $program->logo = 'images/logos/'.$filename;
        }
        $program->save();

        return redirect('programs')->with('status', 'Sukses mengubah data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        unlink($program->logo);
        $program->delete();

        return redirect('programs')->with('status', 'Sukses menghapus data.');
    }
}
