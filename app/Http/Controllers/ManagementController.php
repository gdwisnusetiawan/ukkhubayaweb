<?php

namespace App\Http\Controllers;

use App\Management;
use App\Period;
use App\Position;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $managements = Management::all();
        return view('managements.index', compact('managements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Period $period)
    {
        $positions = Position::all();
        return view('managements.create', compact('period', 'positions'));
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
     * @param  \App\Management  $management
     * @return \Illuminate\Http\Response
     */
    public function show(Management $management)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Management  $management
     * @return \Illuminate\Http\Response
     */
    public function edit(Management $management)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Management  $management
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Management $management)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Management  $management
     * @return \Illuminate\Http\Response
     */
    public function destroy(Management $management)
    {
        //
    }
}
