<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Video;
use App\Models\FConseling;
use App\Traits\HasFConseling;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class FConselingController extends Controller
{
    use HasFConseling;
    

    public function index()
    {
        // get all fconseling
        $fconseling = FConseling::with('videos')->latest()->get();

        // return to landing page
        return view('landing.fconseling.index', compact('fconseling'));
    }

    public function show($slug)
    {
        // get fconseling by slug
        $fconseling = FConseling::where('slug', $slug)->first();

        // get videos by fconseling
        $videos = Video::where('fconseling_id', $fconseling->id)->get();

        // call method members from trait Hasfconseling
        $members = $this->members($fconseling)->count();

        // get transaction by user id
        $transaction = Transaction::with('details')->where('user_id', Auth::id())->where('status', 1)
        ->whereHas('details', function($query) use($fconseling){
            $query->where('fconseling_id', $fconseling->id);
        })->get();

        // define variable $purchased
        $purchased = null;

        // if transaction is not empty
        if($transaction->count() > 0){
            // get all userFConseling, call from method userFConseling, trait hasFConseling
            $purchased = $this->userFConseling()->get();
        }else{
            $purchased = 0;
        }

        return view('landing.fconseling.show', compact('fconseling','videos', 'members', 'purchased', 'transaction'));
    }

    public function video($slug, $episode)
    {
        // get fconseling by slug
        $fconseling = FConseling::where('slug', $slug)->first();

        // get video all video by fconseling
        $video = Video::where('fconseling_id', $fconseling->id)->where('episode', $episode)->first();

        // get transaction by user id
        $transaction = Transaction::with('details')->where('user_id', Auth::id())->where('status', 1)
        ->whereHas('details', function($query) use($fconseling){
            $query->where('fconseling_id', $fconseling->id);
        })->get();

        // define variable $purchased
        $purchased = null;

        // if transaction is not empty
        if($transaction->count() > 0){
            // get all userFConseling, call from method userFConseling, trait hasFConseling
            $purchased = $this->userFConseling()->get();
        }else{
            $purchased = 0;
        }

        // define variable $videos
        $videos = '';

        // user can watch full video if user have this fconseling or user still can watch video only intro video
        if($purchased || $video->intro == 1){
            // if true, get all video by fconseling
            $videos = Video::where('fconseling_id', $fconseling->id)->orderBy('episode')->paginate(10);
        }else{
            // if false, get only intro video
            return back()->with('toast_error', 'You must buy this fconseling first');
        }
        // return to view
        return view('landing.fconseling.video', compact('fconseling','video','videos'));
    }
}
