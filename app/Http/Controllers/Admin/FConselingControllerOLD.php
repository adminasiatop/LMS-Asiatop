<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Video;
use App\Models\FConseling;
use App\Traits\HasImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\FConselingStoreRequest;
use App\Http\Requests\FConselingUpdateRequest;

class FConselingController extends Controller
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
        $fconseling = FConseling::paginate(10);

        // return view with fconseling
        return view('admin.fconseling.index') ;

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
        return view('admin.fconseling.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FConselingStoreRequest $request)
    {
        // call method uploadCover from trait hasCover
        $cover = $this->uploadImage($request, $path = 'public/covers/', $name='cover');

        // get request data from input
        $data = $request->all();
        $data['cover'] = $cover->hashName();

        // create new fconseling
        $fconseling = Auth::user()->fconseling()->create($data);

        // create fconseling with tags by request
        $fconseling->tags()->sync($request->tags);

        // redirect to fconseling inedex with toastr
        return redirect(route('admin.fconseling.index'))->with('toast_success', 'fconseling created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fconseling  $fconseling
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // get fconseling by slug
        $fconseling = FConseling::where('slug', $slug)->first();

        // get videos by fconseling order by episode
        $videos = Video::where('fconseling', $fconseling->id)->orderBy('episode')->paginate(10);

        // return view
        return view('admin.fconseling.show', compact('fconseling', 'videos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FConseling  $fconseling
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        // get fconseling by slug
        $fconseling = FConseling::where('slug', $slug)->first();

        // get all tags
        $tags = Tag::get();

        // return view with fconseling and tags
        return view('admin.fconseling.edit', compact('fconseling', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fconseling  $fconseling
     * @return \Illuminate\Http\Response
     */
    public function update(FConselingUpdateRequest $request, $slug)
    {
        // call method uploadCover from trait hasCover
        $cover = $this->uploadCover($request, $path = 'public/covers/', $name='cover');

        // get fconseling by slug
        $fconseling = FConseling::where('slug', $slug)->first();

        // get request data from input except cover
        $data = $request->except('cover');

        // update fconseling
        $fconseling->update($data);

        // check if user upload new cover
        if($request->file($name)){
            // delete old cover
            Storage::disk('local')->delete($path. basename($fconseling->cover));

            // update fconseling cover
            $fconseling->update([
                'cover' => $cover->hashName()
            ]);
        }

        // update fconseling with tags by request
        $fconseling->tags()->sync($request->tags);

        // redirect to fconseling inedex with toastr
        return redirect(route('admin.fconseling.index'))->with('toast_success', 'fconseling updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FConseling  $fconseling
     * @return \Illuminate\Http\Response
     */
    public function destroy(FConseling $fconseling)
    {
        // delete fconseling with relationship tags
        $fconseling->tags()->detach();

        // delete fconseling by id
        $fconseling->delete();

        // delete fconseling cover by id
        Storage::disk('local')->delete('public/covers/'. basename($fconseling->cover));

        // return redirect back with toastr
        return back()->with('toast_success', 'Fconseling deleted successfully');
    }
}
