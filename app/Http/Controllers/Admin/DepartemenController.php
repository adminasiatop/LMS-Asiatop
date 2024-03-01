<?php

namespace App\Http\Controllers\Admin;

use App\Models\Departemen;
use App\Models\Divisi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class DepartemenController extends Controller
{
    public function index()
    {
        // get all departemen
        $departemen =  departemen::with(['divisi'])->latest()->paginate(10);
        
        // return view
        return view('admin.departemen.index', compact('departemen'));
    }

    public function create()
    {
        $divisi = divisi::all();
        return view ('admin.departemen.create', compact('divisi'));
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'departemenCD'   => 'required|min:2',
            'departemenName'  => 'required|min:5'
        ]);

        //create departemen
        departemen::create([
        'departemenCD' => $request->departemenCD,
        'departemenName' => $request->departemenName,
        'divisiID' => $request->divisiID
        ]);
        
         // redirect to cnc inedex with toastr
         return redirect(route('admin.departemen.index'))->with('toast_success', 'departemen created successfully');

    }

    public function edit(departemen $departemen)
    {
        //dd($departemen);

        return view('admin.departemen.edit', compact('departemen'));

    }

    public function update(Request $request, departemen $departemen)
    {

        //validate form
        $this->validate($request, [
            'departemenCD'   => 'required|min:2',
            'departemenName'  => 'required|min:5'
        ]);

        //create departemen
        $departemen->update([
        'departemenCD' => $request->departemenCD,
        'departemenName' => $request->departemenName,
        'divisiID' => $request->divisiID
        ]);
        
         // redirect to departemen index with toastr
         return redirect(route('admin.departemen.index'))->with('toast_success', 'departemen updated successfully');

    }

    public function destroy(departemen $departemen)
    {
        $departemen->delete();

        // redirect to departemen index with toastr
        return redirect(route('admin.departemen.index'))->with('toast_success', 'Deleted successfully');

    }
}