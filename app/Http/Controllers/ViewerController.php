<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Event;

class ViewerController extends Controller
{
    /**
     * Show the landing page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	$profile = Profile::latest()->first();
    	$events = Event::all()->sortBy(function($event) {
    	    return $event->period->year_begin;
    	});
        return view('pages.index', compact('profile', 'events'));
    }
}
