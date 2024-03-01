<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Video;
use App\Models\Cnc;
use App\Traits\HasImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CncStoreRequest;
use App\Http\Requests\CncUpdateRequest;

class CncController extends Controller
{
    use HasImage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Cnc with search and paginate
        $cnc = Cnc::with('tags')->search('name')->paginate(10);

        // return view with cnc
        return view('admin.cnc.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view with tags
        return view('admin.cnc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // call method uploadCover from trait hasCover
       // $cover = $this->uploadImage($request, $path = 'public/covers/', $name='cover');
       
        // get request data from input
        $data = $request->all();
        
        //dd($data);
        //$series = Auth::user()->series()->create($data);
        // create new cnc
        cnc::create($data);

        // redirect to cnc inedex with toastr
        return redirect(route('admin.cnc.index'))->with('toast_success', 'Cnc created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cnc  $cnc
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // get cnc by slug
        $cnc = Cnc::where('slug', $slug)->first();

        // get videos by cnc order by episode
        $videos = Video::where('cnc_id', $cnc->id)->orderBy('episode')->paginate(10);

        // return view
        return view('admin.cnc.show', compact('cnc', 'videos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cnc  $cnc
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        // get cnc by slug
        $cnc = Cnc::where('slug', $slug)->first();

        // get all tags
        $tags = Tag::get();

        // return view with cnc and tags
        return view('admin.cnc.edit', compact('cnc', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cnc  $cnc
     * @return \Illuminate\Http\Response
     */
    public function update(CncUpdateRequest $request, $slug)
    {
        // call method uploadCover from trait hasCover
        $cover = $this->uploadCover($request, $path = 'public/covers/', $name='cover');

        // get cnc by slug
        $cnc = Cnc::where('slug', $slug)->first();

        // get request data from input except cover
        $data = $request->except('cover');

        // update cnc
        $cnc->update($data);

        // check if user upload new cover
        if($request->file($name)){
            // delete old cover
            Storage::disk('local')->delete($path. basename($cnc->cover));

            // update cnc cover
            $cnc->update([
                'cover' => $cover->hashName()
            ]);
        }

        // update cnc with tags by request
        $cnc->tags()->sync($request->tags);

        // redirect to cnc inedex with toastr
        return redirect(route('admin.cnc.index'))->with('toast_success', 'Cnc updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cnc  $cnc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cnc $cnc)
    {
        // delete cnc with relationship tags
        $cnc->tags()->detach();

        // delete cnc by id
        $cnc->delete();

        // delete cnc cover by id
        Storage::disk('local')->delete('public/covers/'. basename($cnc->cover));

        // return redirect back with toastr
        return back()->with('toast_success', 'Cnc deleted successfully');
    }
}
