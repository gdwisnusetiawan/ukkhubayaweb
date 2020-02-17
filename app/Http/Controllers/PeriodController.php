<?php

namespace App\Http\Controllers;

use App\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periods = Period::orderBy('year_begin', 'desc')->get();
        return view('periods.index', compact('periods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('periods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'year_begin' => [
                'required',
                'digits:4',
                'integer',
                'unique:periods',
            ],
            'year_end' => [
                'required',
                'digits:4',
                'integer',
                'unique:periods',
                function ($attribute, $value, $fail) use ($request) {
                    if ($value - $request->get('year_begin') != 1) {
                        $fail($attribute.' must be year_begin plus one.');
                    }
                },
            ],
        ])->validate();

        $period = new Period();
        $period->year_begin = $request->get('year_begin');
        $period->year_end = $request->get('year_end');
        $period->save();

        return redirect('periods')->with('status', 'Sukses menambah data.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function show(Period $period)
    {
        $managements = $period->managements->sortBy(function($managements) {
            return $managements->position->order;
        });
        $membersCount = 0;
        foreach ($managements as $management) {
            $membersCount += $management->members->count();
        }
        return view('periods.show', compact('managements', 'period', 'membersCount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function edit(Period $period)
    {
        return view('periods.edit', compact('period'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Period $period)
    {
        $validator = Validator::make($request->all(), [
            'year_begin' => [
                'required',
                'digits:4',
                'integer',
            ],
            'year_end' => [
                'required',
                'digits:4',
                'integer',
                function ($attribute, $value, $fail) use ($request) {
                    if ($value - $request->get('year_begin') != 1) {
                        $fail($attribute.' must be year_begin plus one.');
                    }
                },
            ],
        ])->validate();

        $period->year_begin = $request->get('year_begin');
        $period->year_end = $request->get('year_end');
        $period->save();

        return redirect('periods')->with('status', 'Sukses mengubah data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy(Period $period)
    {
        $period->delete();

        return redirect('periods')->with('status', 'Sukses menghapus data.');
    }
}
