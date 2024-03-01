@extends('layouts.backend.master')

@section('title', 'Form Identifikasi Coaching')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <x-card.card title="Form Input Karyawan">
                    <form action="{{ route('admin.karyawan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-3">
                                    <x-form.input class="col-3 col-md-3" type="text" title="NIK" name="nik" value=""
                                    placeholder="Input NIK karyawan"/>
                                </div>
                                <div class="col-3">
                                    <x-form.input class="col-3 col-md-3" type="text" title="Nama karyawan" name="nama" value=""
                                    placeholder="Input Nama karyawan"/>
                                </div>
                            
                                <div class="col-3">
                                    <x-form.input class="col-3 col-md-3" type="text" title="Jabatan" name="jabatan" value=""
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
                                <label for="position-option">Departemen</label>
                                    <select class="form-control" id="departemen-option" name="departemenID">
                                        @foreach ($departemen as $departemen)
                                            <option value="{{ $departemen->id }}">{{ $departemen->departemenName }}</option>
                                        @endforeach
                                    </select>                                </div>
                                <div class="col-3">
                                    <x-form.input class="col-3 col-md-3" type="text" title="status" name="status" value=""
                                    placeholder="status"/>
                                </div>
                            </div>
                            
                        <x-button.button-save title="Save" icon="save" class="btn btn-primary" />
                        <x-button.button-link class="btn btn-dark text-white" title="Go Back" icon="arrow-left"
                            url="{{ route('admin.karyawan.index') }}">
                        </x-button.button-link>
                    </form>
                </x-card.card>
            </div>
        </div>
    </div>
@endsection
