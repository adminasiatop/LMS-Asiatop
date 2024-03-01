@extends('layouts.backend.master')

@section('title', 'Edit Series')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <x-card.card title="Edit divisi">
                    <form action="{{ route('admin.divisi.update', $divisi->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                                <div class="col-3">
                                    <x-form.input class="col-3 col-md-3" type="text" title="NIK" name="divisiCd" value="{{ old('divisiCd', $divisi->divisiCd) }}"
                                    placeholder="Input NIK divisi"/>
                                </div>
                                <div class="col-3">
                                    <x-form.input class="col-3 col-md-3" type="text" title="Nama divisi" name="divisiName" value="{{ old('divisiName', $divisi->divisiName) }}"
                                    placeholder="Input Nama divisi"/>
                                </div>
                            
                            </div>
                        <x-button.button-save title="Save" icon="save" class="btn-primary" />
                        <x-button.button-link class="btn btn-dark text-white" title="Go Back" icon="arrow-left"
                            url="{{ route('admin.divisi.index') }}">
                        </x-button.button-link>
                    </form>
                </x-card.card>
            </div>
        </div>
    </div>
@endsection
