<?php

namespace App\Http\Controllers\Admin;

use App\Models\Divisi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class DivisiController extends Controller
{
    public function index()
    {
        // get all divisi
        $divisi =  divisi::latest()->paginate(5);

        // return view
        return view('admin.divisi.index', compact('divisi'));
    }

    public function create()
    {
        return view ('admin.divisi.create');
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'divisiCd'   => 'required|min:2',
            'divisiName'  => 'required|min:3'
        ]);

        //create divisi
        divisi::create([
        'divisiCd' => $request->divisiCd,
        'divisiName' => $request->divisiName
        ]);
        
         // redirect to cnc inedex with toastr
         return redirect(route('admin.divisi.index'))->with('toast_success', 'divisi created successfully');

    }

    public function edit(divisi $divisi)
    {
        return view('admin.divisi.edit', compact('divisi'));

    }

    public function update(Request $request, divisi $divisi)
    {

        //validate form
        $this->validate($request, [
            'divisiCd'   => 'required|min:6',
            'divisiName'  => 'required|min:5'
        ]);

        //create divisi
        $divisi->update([
        'divisiCd' => $request->divisiCd,
        'divisiName' => $request->divisiName
        ]);
        
         // redirect to divisi index with toastr
         return redirect(route('admin.divisi.index'))->with('toast_success', 'divisi updated successfully');

    }

    public function destroy(divisi $divisi)
    {
        $divisi->delete();

        // redirect to divisi index with toastr
        return redirect(route('admin.divisi.index'))->with('toast_success', 'Deleted successfully');

    }
}