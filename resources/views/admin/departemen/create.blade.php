@extends('layouts.backend.master')

@section('title', 'Form Identifikasi Coaching')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <x-card.card title="Form Input departemen">
                    <form action="{{ route('admin.departemen.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-3">
                                    <x-form.input class="col-3 col-md-3" type="text" title="Kode departemen" name="departemenCD" value=""
                                    placeholder="Input kode departemen"/>
                                </div>
                                <div class="col-3">
                                    <x-form.input class="col-3 col-md-3" type="text" title="Nama departemen" name="departemenName" value=""
                                    placeholder="Input Nama departemen"/>
                                </div>
                                <div class="col-3">
                                    <label for="position-option">Divisi</label>
                                    <select class="form-control" id="divisi-option" name="divisiID">
                                    @foreach ($divisi as $divisi)
                                        <option value="{{ $divisi->id }}">{{ $divisi->divisiName }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        <x-button.button-save title="Save" icon="save" class="btn btn-primary" />
                        <x-button.button-link class="btn btn-dark text-white" title="Go Back" icon="arrow-left"
                            url="{{ route('admin.departemen.index') }}">
                        </x-button.button-link>
                    </form>
                </x-card.card>
            </div>
        </div>
    </div>
@endsection
