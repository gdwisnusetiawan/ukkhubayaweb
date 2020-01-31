<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::orderBy('order', 'asc')->get();
        return view('positions.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('positions.create');
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
            'name' => 'required|max:255|unique:positions',
            'icon' => 'required|starts_with:fas fa-, far fa-, fab fa-',
            'order' => 'required|integer|min:0',
        ]);

        $position = new Position();
        $position->name = $request->get('name');
        $position->icon = $request->get('icon');
        $position->order = $request->get('order');
        $position->save();

        return redirect('positions')->with('status', 'Sukses menambah data.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        return view('positions.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                'max:255',
                Rule::unique('positions')->ignore($position),
            ],
            'icon' => 'required|starts_with:fas fa-, far fa-, fab fa-',
            'order' => 'required|integer|min:0',
        ]);

        $position->name = $request->get('name');
        $position->icon = $request->get('icon');
        $position->order = $request->get('order');
        $position->save();

        return redirect('positions')->with('status', 'Sukses mengubah data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        $position->delete();

        return redirect('positions')->with('status', 'Sukses menghapus data.');
    }
}
