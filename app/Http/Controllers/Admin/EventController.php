<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Video;
use App\Models\Event;
use App\Traits\HasImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\EventStoreRequest;
use App\Http\Requests\SeriesUpdateRequest;

class EventController extends Controller
{
    use HasImage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // series with search and paginate
        $event = Event::paginate(15);

        // return view with series
        return view('admin.event.index', compact('event'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // return view with tags
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventStoreRequest $request)
    {
        // call method uploadCover from trait hasCover
        $cover = $this->uploadImage($request, $path = 'public/covers/', $name='cover');

        // get request data from input
        $data = $request->all();
        $data['cover'] = $cover->hashName();

        // create new event
        $event = Event::create($data);


        // redirect to series inedex with toastr
        return redirect(route('admin.event.index'))->with('toast_success', 'Series created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // get series by slug
        $event = Event::where('slug', $slug)->first();

        // get videos by series order by episode
        $videos = Video::where('event_id', $event->id)->orderBy('episode')->paginate(10);

        // return view
        return view('admin.event.show', compact('event', 'videos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $Event
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        // get series by slug
        $event = Event::where('slug', $slug)->first();

        // get all tags
        $tags = Tag::get();

        // return view with Event and tags
        return view('admin.event.edit', compact('event', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function update(EventUpdateRequest $request, $slug)
    {
        // call method uploadCover from trait hasCover
        $cover = $this->uploadCover($request, $path = 'public/covers/', $name='cover');

        // get series by slug
        $event = Series::where('slug', $slug)->first();

        // get request data from input except cover
        $data = $request->except('cover');

        // update series
        $event->update($data);

        // check if user upload new cover
        if($request->file($name)){
            // delete old cover
            Storage::disk('local')->delete($path. basename($series->cover));

            // update series cover
            $event->update([
                'cover' => $cover->hashName()
            ]);
        }

        // update series with tags by request
        $event->tags()->sync($request->tags);

        // redirect to series inedex with toastr
        return redirect(route('admin.event.index'))->with('toast_success', 'Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $Event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        // delete series with relationship tags
        // $event->tags()->detach();

        // delete series by id
        $event->delete();

        // delete series cover by id
        Storage::disk('local')->delete('public/covers/'. basename($event->cover));

        // return redirect back with toastr
        return back()->with('toast_success', 'Series deleted successfully');
    }
}
