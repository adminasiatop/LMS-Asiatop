<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Video;
use App\Models\FCoaching;
use App\Traits\HasImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\FCoachingStoreRequest;
use App\Http\Requests\FCoachingUpdateRequest;

class FCoachingController extends Controller
{
    use HasImage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // // Fconselling with search and paginate
       $fcoaching = FCoaching::paginate(10);


        // return view with fcoaching
        return view('admin.fcoaching.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get all tags
        $tags = Tag::get();

        // return view with tags
        return view('admin.fcoaching.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FCoachingStoreRequest $request)
    {
        // call method uploadCover from trait hasCover
        $cover = $this->uploadImage($request, $path = 'public/covers/', $name='cover');

        // get request data from input
        $data = $request->all();
        $data['cover'] = $cover->hashName();

        // create new fcoaching
        $fcoaching = Auth::user()->fcoaching()->create($data);

        // create fcoaching with tags by request
        $fcoaching->tags()->sync($request->tags);

        // redirect to fcoaching inedex with toastr
        return redirect(route('admin.fcoaching.index'))->with('toast_success', 'fcoaching created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FCoaching  $fcoaching
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // get fcoaching by slug
        $fcoaching = FCoaching::where('slug', $slug)->first();

        // get videos by fcoaching order by episode
        $videos = Video::where('fcoaching_id', $fcoaching->id)->orderBy('episode')->paginate(10);

        // return view
        return view('admin.fcoaching.show', compact('fcoaching', 'videos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FCoaching  $fcoaching
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        // get fcoaching by slug
        $fcoaching = FCoaching::where('slug', $slug)->first();

        // get all tags
        $tags = Tag::get();

        // return view with fcoaching and tags
        return view('admin.fcoaching.edit', compact('fcoaching', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FCoaching  $fcoaching
     * @return \Illuminate\Http\Response
     */
    public function update(FCoachingUpdateRequest $request, $slug)
    {
        // call method uploadCover from trait hasCover
        $cover = $this->uploadCover($request, $path = 'public/covers/', $name='cover');

        // get fcoaching by slug
        $fcoaching = FCoaching::where('slug', $slug)->first();

        // get request data from input except cover
        $data = $request->except('cover');

        // update fcoaching
        $fcoaching->update($data);

        // check if user upload new cover
        if($request->file($name)){
            // delete old cover
            Storage::disk('local')->delete($path. basename($fcoaching->cover));

            // update fcoaching cover
            $fcoaching->update([
                'cover' => $cover->hashName()
            ]);
        }

        // update fcoaching with tags by request
        $fcoaching->tags()->sync($request->tags);

        // redirect to fcoaching inedex with toastr
        return redirect(route('admin.fcoaching.index'))->with('toast_success', 'FChoaching updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FChoaching  $fcoaching
     * @return \Illuminate\Http\Response
     */
    public function destroy(FCoaching $fcoaching)
    {
        // delete fcoaching with relationship tags
        $fcoaching->tags()->detach();

        // delete fcoaching by id
        $fcoaching->delete();

        // delete fcoaching cover by id
        Storage::disk('local')->delete('public/covers/'. basename($fcoaching->cover));

        // return redirect back with toastr
        return back()->with('toast_success', 'FCoaching deleted successfully');
    }
}
