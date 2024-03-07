<?php

namespace App\Http\Controllers\Admin;

use App\Models\Karyawan;
use App\Models\Departemen;
use App\Models\Divisi;
use App\Models\Identifikasicoaching;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class IdentifikasicoachingController extends Controller
{
    public function index()
    {
        // get all karyawan
        //$identifikasicoaching =  Identifikasicoaching::with(['karyawan'])->latest()->paginate(15);

        $identifikasicoaching = DB::table('identifikasicoachings as i')
            ->select('i.*', 'k.nama as coachName', 'kc.nama as coacheeName')
            ->leftJoin('karyawans as k', 'k.id', '=', 'i.coachkaryawanID')
            ->leftJoin('karyawans as kc', 'kc.id', '=', 'i.coacheekaryawanID')
            ->get();

       
        // return view
        return view('admin.Identifikasicoaching.index', compact('identifikasicoaching'));
    }

    public function create()
    {

        // get all karyawan buat coach
        $karyawan = Karyawan::all();

        // get all karyawan buat coach
        $karyawanb = Karyawan::all();


        // return view dengan data divisi dan departemen
        return view('admin.identifikasicoaching.create', compact('karyawan', 'karyawanb'));
    }

    public function store(Request $request)
    {
        //validate form
        // $this->validate($request, [
        //     'nik'   => 'required|min:6',
        //     'nama'  => 'required|min:5'
        // ]);

        // dd($request);

        // {
        //     $request->validate([

        //         'r_coaching' => 'boolean',
    
        //     ]);
    
        //     $identifikasiCoaching = new IdentifikasiCoaching;
        //     $identifikasiCoaching->r_coaching = $request->r_coaching;
        //     $identifikasiCoaching->save();
            

        // }

        Identifikasicoaching::create([
            'coachkaryawanID' => $request->coachkaryawanID,
            'coacheekaryawanID' => $request->coacheekaryawanID,
            'tanggal' => $request->tanggal,
            'permasalahan' => $request->permasalahan,
            'strategi' => $request->strategi,
            'rencana' => $request->rencana,
            'r_coaching' => $request->r_coaching,
            'r_enhancement' => $request->r_enhancement,
            'r_mentoring' => $request->r_mentoring,
            'r_counseling' => $request->r_counseling,
            'r_meeting' => $request->r_coaching,
            'r_clinic' => $request->r_clinic,
            'p_leadership' => $request->p_leadership,
            'p_developforothers' => $request->p_developforothers,
            'p_timemanagement' => $request->p_timemanagement,
            'p_transferknowledge' => $request->p_transferknowledge,
            'p_monitoringlaporanteam' => $request->p_monitoringlaporanteam,
            'p_idealhabits' => $request->p_idealhabits,
            'goal' => $request->goal,
            'reality' => $request->reality,
            'opsi' => $request->opsi,
            'will' => $request->will
        ]);

        // redirect to cnc inedex with toastr
        return redirect(route('admin.identifikasicoaching.index'))->with('toast_success', 'Identifikasi coaching created successfully');
    }

    public function edit(Identifikasicoaching $Identifikasicoaching)
    {
        // get all data divisi
        $divisi = divisi::all();

        //get all data departemen
        $karyawan = karyawan::all();

        // get all karyawan buat coachee
        $karyawanb = Karyawan::all();

        $identifikasicoaching = DB::table('identifikasicoachings as i')
            ->select('i.*', 'k.nama as coachName', 'kc.nama as coacheeName')
            ->leftJoin('karyawans as k', 'k.id', '=', 'i.coachkaryawanID')
            ->leftJoin('karyawans as kc', 'kc.id', '=', 'i.coacheekaryawanID')
            ->get();

        // return to view
        return view('admin.identifikasicoaching.edit', compact('Identifikasicoaching', 'karyawan', 'karyawanb'));
    }

    public function update(Request $request, Identifikasicoaching $Identifikasicoaching)
    {

        // //validate form
        // $this->validate($request, [
        //     'nik'   => 'required|min:6',
        //     'nama'  => 'required|min:5'
        // ]);
        // dd($Identifikasicoaching);
        //create karyawan
        $Identifikasicoaching->update([
            'coacheekaryawanID' => $request->coacheekaryawanID,
            'tanggal' => $request->tanggal,
            'permasalahan' => $request->permasalahan,
            'strategi' => $request->strategi,
            'rencana' => $request->rencana,
            'r_coaching' => $request->r_coaching,
            'r_enhancement' => $request->r_enhancement,
            'r_mentoring' => $request->r_mentoring,
            'r_counseling' => $request->r_counseling,
            'r_meeting' => $request->r_coaching,
            'r_clinic' => $request->r_clinic,
            'p_leadership'=> $request->p_leadership,
            'p_developforothers'=> $request->p_developforothers,
            'p_timemanagement'=> $request->p_timemanagement,
            'p_transferknowledge'=> $request->p_transferknowledge,
            'p_monitoringlaporanteam'=> $request->p_monitoringlaporanteam,
            'p_idealhabits'=> $request->p_idealhabits,
            'goal' => $request->goal,
            'reality' => $request->reality,
            'opsi' => $request->opsi,
            'will' => $request->will
        ]);

        // redirect to karyawan index with toastr
        return redirect(route('admin.identifikasicoaching.index'))->with('toast_success', 'Coaching Identify updated successfully');
    }

    public function destroy(Identifikasicoaching $Identifikasicoaching)
    {
        $Identifikasicoaching->delete();

        // redirect to karyawan index with toastr
        return redirect(route('admin.identifikasicoaching.index'))->with('toast_success', 'Deleted successfully');
    }
}
