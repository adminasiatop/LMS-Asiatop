<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Video;
use App\Models\Cnc;
use App\Traits\HasCnc;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class CncController extends Controller
{
    use HasCnc;
    

    public function index()
    {
        // get all cnc
        $cnc = Cnc::with('videos')->latest()->get();

        // return to landing page
        return view('landing.cnc.index', compact('cnc'));
    }

    public function show($slug)
    {
        // get cnc by slug
        $cnc = Cnc::where('slug', $slug)->first();

        // get videos by cnc
        $videos = Video::where('cnc_id', $cnc->id)->get();

        // call method members from trait Hascnc
        $members = $this->members($cnc)->count();

        // get transaction by user id
        $transaction = Transaction::with('details')->where('user_id', Auth::id())->where('status', 1)
        ->whereHas('details', function($query) use($cnc){
            $query->where('cnc_id', $cnc->id);
        })->get();

        // define variable $purchased
        $purchased = null;

        // if transaction is not empty
        if($transaction->count() > 0){
            // get all userCnc, call from method userCnc, trait hasCnc
            $purchased = $this->userCnc()->get();
        }else{
            $purchased = 0;
        }

        return view('landing.cnc.show', compact('cnc','videos', 'members', 'purchased', 'transaction'));
    }

    public function video($slug, $episode)
    {
        // get cnc by slug
        $cnc = Cnc::where('slug', $slug)->first();

        // get video all video by cnc
        $video = Video::where('cnc_id', $cnc->id)->where('episode', $episode)->first();

        // get transaction by user id
        $transaction = Transaction::with('details')->where('user_id', Auth::id())->where('status', 1)
        ->whereHas('details', function($query) use($cnc){
            $query->where('cnc_id', $cnc->id);
        })->get();

        // define variable $purchased
        $purchased = null;

        // if transaction is not empty
        if($transaction->count() > 0){
            // get all userCnc, call from method userCnc, trait hasCnc
            $purchased = $this->userCnc()->get();
        }else{
            $purchased = 0;
        }

        // define variable $videos
        $videos = '';

        // user can watch full video if user have this cnc or user still can watch video only intro video
        if($purchased || $video->intro == 1){
            // if true, get all video by cnc
            $videos = Video::where('cnc_id', $cnc->id)->orderBy('episode')->paginate(10);
        }else{
            // if false, get only intro video
            return back()->with('toast_error', 'You must buy this cnc first');
        }
        // return to view
        return view('landing.cnc.video', compact('cnc','video','videos'));
    }
}
