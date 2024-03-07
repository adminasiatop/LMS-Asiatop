<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\Event;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LandingController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Series $series)
    {
        // get all series
        $series = Series::with('videos')->oldest()->take(3)->get();

        // get all Event
        $event = Event::with('videos')->latest()->take(3)->get();
        
        // return to landing page
        return view('landing.index', compact('series','event'));
    }
}
