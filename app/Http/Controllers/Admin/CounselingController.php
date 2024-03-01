<?php

namespace App\Http\Controllers\Admin;

use App\Models\Karyawan;
use App\Models\Departemen;
use App\Models\Divisi;
use App\Models\Counseling;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class CounselingController extends Controller
{
    public function index()
    {
        // get all karyawan
        //$counseling =  counseling::with(['karyawan'])->latest()->paginate(15);

        $counseling = DB::table('counselings as i')
            ->select('i.*', 'k.nama as coachName', 'kc.nama as coacheeName')
            ->leftJoin('karyawans as k', 'k.id', '=', 'i.coachkaryawanID')
            ->leftJoin('karyawans as kc', 'kc.id', '=', 'i.coacheekaryawanID')
            ->get();

        // return view
        return view('admin.counseling.index', compact('counseling'));
    }

    public function create()
    {

        // get all karyawan buat coach
        $karyawan = Karyawan::all();

        // get all karyawan buat coach
        $karyawanb = Karyawan::all();


        // return view dengan data divisi dan departemen
        return view('admin.counseling.create', compact('karyawan', 'karyawanb'));
    }

    public function store(Request $request)
    {
        //validate form
        // $this->validate($request, [
        //     'nik'   => 'required|min:6',
        //     'nama'  => 'required|min:5'
        // ]);

        //create karyawan
        Counseling::create([
            'coachkaryawanID' => $request->coachkaryawanID,
            'coacheekaryawanID' => $request->coacheekaryawanID,
            'tanggal' => $request->tanggal,
            'topikkonseling' => $request->topikkonseling,
            'responsekonseling' => $request->responsekonseling,
            'fukonseling' => $request->fukonseling,
            'targetkonseling' => $request->targetkonseling,
            'hasilkonseling' => $request->hasilkonseling,
            'summary' => $request->summary

        ]);

        // redirect to cnc inedex with toastr
        return redirect(route('admin.counseling.index'))->with('toast_success', 'Form Counseling created successfully');
    }

    public function edit(Counseling $Counseling)
    {
        // get all data divisi
        $divisi = divisi::all();

        //get all data departemen
        $karyawan = karyawan::all();

        // get all karyawan buat coachee
        $karyawanb = Karyawan::all();

        // return to view
        return view('admin.counseling.edit', compact('Counseling', 'karyawan', 'karyawanb'));
    }

    public function update(Request $request, Counseling $Counseling)
    {

        //validate form
        // $this->validate($request, [
        //     'nik'   => 'required|min:6',
        //     'nama'  => 'required|min:5'
        // ]);

        //create karyawan
        $Counseling->update([
            'coachkaryawanID' => $request->coachkaryawanID,
            'coacheekaryawanID' => $request->coacheekaryawanID,
            'tanggal' => $request->tanggal,
            'topikkonseling' => $request->topikkonseling,
            'responsekonseling' => $request->responsekonseling,
            'fukonseling' => $request->fukonseling,
            'targetkonseling' => $request->targetkonseling,
            'hasilkonseling' => $request->hasilkonseling,
            'summary' => $request->summary
        ]);

        // redirect to karyawan index with toastr
        return redirect(route('admin.counseling.index'))->with('toast_success', 'Karyawan updated successfully');
    }

    public function destroy(Counseling $Counseling)
    {
        $Counseling->delete();

        // redirect to karyawan index with toastr
        return redirect(route('admin.counseling.index'))->with('toast_success', 'Deleted successfully');
    }
}
