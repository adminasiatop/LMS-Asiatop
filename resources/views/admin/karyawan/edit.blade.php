@extends('layouts.backend.master')

@section('title', 'Edit Series')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <x-card.card title="Edit karyawan">
                    <form action="{{ route('admin.karyawan.update', $karyawan->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                                <div class="col-3">
                                    <x-form.input class="col-3 col-md-3" type="text" title="NIK" name="nik" value="{{ old('nik', $karyawan->nik) }}"
                                    placeholder="Input NIK karyawan"/>
                                </div>
                                <div class="col-3">
                                    <x-form.input class="col-3 col-md-3" type="text" title="Nama karyawan" name="nama" value="{{ old('nama', $karyawan->nama) }}"
                                    placeholder="Input Nama karyawan"/>
                                </div>
                            
                                <div class="col-3">
                                    <x-form.input class="col-3 col-md-3" type="text" title="Jabatan" name="jabatan" value="{{ old('jabatan', $karyawan->jabatan) }}"
                                    placeholder="Input Jabatan" />
                                </div>    
                            </div>
                            <div class="row">        
                                <div class="col-3">
                                    <label for="position-option">Divisi</label>
                                    <select class="form-control" id="divisi-option" name="divisiID">
                                        @foreach ($divisi as $divisi)
                                            <option value="{{ $divisi->id }}">{{ $divisi->divisiName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-3">
                                    <label for="position-option">Departement</label>
                                    <select class="form-control" id="departemen-option" name="departemenID">
                                        @foreach ($departemen as $departemen)
                                            <option value="{{ $departemen->id }}">{{ $departemen->departemenName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-3">
                                    <x-form.input class="col-3 col-md-3" type="text" title="Status" name="status" value="{{ old('status', $karyawan->status) }}"
                                    placeholder="Status"/>
                                </div>
                            </div>
                        <x-button.button-save title="Save" icon="save" class="btn-primary" />
                        <x-button.button-link class="btn btn-dark text-white" title="Go Back" icon="arrow-left"
                            url="{{ route('admin.karyawan.index') }}">
                        </x-button.button-link>
                    </form>
                </x-card.card>
            </div>
        </div>
    </div>
@endsection
