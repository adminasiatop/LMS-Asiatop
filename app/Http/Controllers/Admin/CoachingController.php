<?php

namespace App\Http\Controllers\Admin;

use App\Models\Karyawan;
use App\Models\Departemen;
use App\Models\Divisi;
use App\Models\Coaching;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class CoachingController extends Controller
{
    public function index()
    {
        // get all karyawan
        //$coaching =  Coaching::with(['karyawan'])->latest()->paginate(15);

        $coaching = DB::table('coachings as i')
            ->select('i.*', 'k.nama as coachName', 'kc.nama as coacheeName')
            ->leftJoin('karyawans as k', 'k.id', '=', 'i.coachkaryawanID')
            ->leftJoin('karyawans as kc', 'kc.id', '=', 'i.coacheekaryawanID')
            ->get();

        // return view
        return view('admin.coaching.index', compact('coaching'));
    }

    public function create()
    {

        // get all karyawan buat coach
        $karyawan = Karyawan::all();

        // get all karyawan buat coachee
        $karyawanb = Karyawan::all();


        // return view dengan data divisi dan departemen
        return view('admin.coaching.create', compact('karyawan', 'karyawanb'));
    }

    public function store(Request $request)
    {
        //validate form
        // $this->validate($request, [
        //     'nik'   => 'required|min:6',
        //     'nama'  => 'required|min:5'
        // ]);

        //create karyawan
        Coaching::create([
            'coachkaryawanID' => $request->coachkaryawanID,
            'coacheekaryawanID' => $request->coacheekaryawanID,
            'tanggal' => $request->tanggal,
            'topik' => $request->topik,
            'point' => $request->point,
            'indikator' => $request->indikator,
            'improvement' => $request->improvement,
            'support' => $request->support,
            'goal' => $request->goal,
            'reality' => $request->reality,
            'opsi' => $request->opsi,
            'will' => $request->will
        ]);

        // redirect to cnc inedex with toastr
        return redirect(route('admin.coaching.index'))->with('toast_success', 'Form Coaching created successfully');
    }

    public function edit(Coaching $Coaching)
    {
        // get all data divisi
        $divisi = divisi::all();

        //get all data departemen
        $karyawan = karyawan::all();

        // get all karyawan buat coachee
        $karyawanb = Karyawan::all();

        // return to view
        return view('admin.coaching.edit', compact('Coaching', 'karyawan', 'karyawanb'));
    }

    public function update(Request $request, Coaching $Coaching)
    {

        // //validate form
        // $this->validate($request, [
        //     'nik'   => 'required|min:6',
        //     'nama'  => 'required|min:5'
        // ]);

        //create karyawan
        $Coaching->update([
            'coacheekaryawanID' => $request->coacheekaryawanID,
            'tanggal' => $request->tanggal,
            'topik' => $request->topik,
            'point' => $request->point,
            'indikator' => $request->indikator,
            'improvement' => $request->improvement,
            'support' => $request->support,
            'goal' => $request->goal,
            'reality' => $request->reality,
            'opsi' => $request->opsi,
            'will' => $request->will
        ]);

        // redirect to karyawan index with toastr
        return redirect(route('admin.coaching.index'))->with('toast_success', 'Karyawan updated successfully');
    }

    public function destroy(Coaching $Coaching)
    {
        $Coaching->delete();

        // redirect to karyawan index with toastr
        return redirect(route('admin.coaching.index'))->with('toast_success', 'Deleted successfully');
    }
}
