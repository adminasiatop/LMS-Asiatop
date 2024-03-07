<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Video;
use App\Models\Series;
use App\Traits\HasSeries;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    public function index()
    {
        // get all event
        $event = Event::with('videos')->latest()->get();

        // return to landing page
        return view('landing.event.index', compact('event'));
    }

    public function show($slug)
    {
        // get series by slug
        $event = Event::where('slug', $slug)->first();

        // get videos by Event
        $videos = Video::where('event_id', $event->id)->get();



        return view('landing.event.show', compact('event','videos'));
    }

    public function video($slug, $episode)
    {
        // get event by slug
        $event = Event::where('slug', $slug)->first();

        // get video all video by event
        $video = Video::where('event_id', $event->id)->where('episode', $episode)->first();

        // define variable $videos
        $videos = '';

        $videos = Video::where('event_id', $event->id)->orderBy('episode')->paginate(10);

        // return to view
        return view('landing.event.video', compact('event','video','videos'));
    }
}
