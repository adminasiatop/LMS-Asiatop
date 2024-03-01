<?php

namespace App\Http\Controllers\Admin;

use App\Models\Karyawan;
use App\Models\Departemen;
use App\Models\Divisi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class KaryawanController extends Controller
{
    public function index()
    {
        // get all karyawan join ke divisi
        $karyawan =  Karyawan::with(['divisi'])->latest()->paginate(15);
        
        // return view
        return view('admin.karyawan.index', compact('karyawan'));
    }

    public function create()
    {
        // get all divisi
        $divisi = divisi::all();

        // get all departemen
        $departemen = departemen::all();

        // return view dengan data divisi dan departemen
        return view ('admin.karyawan.create', compact('divisi', 'departemen'));
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nik'   => 'required|min:6',
            'nama'  => 'required|min:5'
        ]);

        //create karyawan
        Karyawan::create([
        'nik' => $request->nik,
        'nama' => $request->nama,
        'jabatan' => $request->jabatan,
        'divisiID' => $request->divisiID,
        'departemenID' => $request->departemenID,
        'status' => $request->status
        ]);
        
         // redirect to cnc inedex with toastr
         return redirect(route('admin.karyawan.index'))->with('toast_success', 'Karyawan created successfully');

    }

    public function edit(Karyawan $karyawan)
    {
        // get all data divisi
        $divisi = divisi::all();

        //get all data departemen
        $departemen = departemen::all();

        // return to view
        return view('admin.karyawan.edit', compact('karyawan', 'divisi', 'departemen'));

    }

    public function update(Request $request, karyawan $karyawan)
    {

        //validate form
        $this->validate($request, [
            'nik'   => 'required|min:6',
            'nama'  => 'required|min:5'
        ]);

        //create karyawan
        $karyawan->update([
        'nik' => $request->nik,
        'nama' => $request->nama,
        'jabatan' => $request->jabatan,
        'divisiID' => $request->divisiID,
        'departemenID' => $request->departemenID,
        'status' => $request->status
        ]);
        
         // redirect to karyawan index with toastr
         return redirect(route('admin.karyawan.index'))->with('toast_success', 'Karyawan updated successfully');

    }

    public function destroy(karyawan $karyawan)
    {
        $karyawan->delete();

        // redirect to karyawan index with toastr
        return redirect(route('admin.karyawan.index'))->with('toast_success', 'Deleted successfully');

    }
}