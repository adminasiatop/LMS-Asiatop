@extends('layouts.backend.master')

@section('title', 'Edit Departemen')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <x-card.card title="Edit departemen">
                    <form action="{{ route('admin.departemen.update', $departemen->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                                <div class="col-3">
                                    <x-form.input class="col-3 col-md-3" type="text" title="Departemen Cod" name="departemenCD" value="{{ old('departemenCD', $departemen->departemenCD ) }}"
                                    placeholder="Input Kode departemen"/>
                                </div>
                                <div class="col-3">
                                    <x-form.input class="col-3 col-md-3" type="text" title="Nama departemen" name="departemenName" value="{{ old('departemenName', $departemen->departemenName) }}"
                                    placeholder="Input Nama departemen"/>
                                </div>
                                <div class="col-3">
                                    @foreach ($departemen->divisi()->get() as $divisi)
                                        {{ $divisi->divisiName }}
                                    @endforeach    
                                </div>
                            </div>
                        <x-button.button-save title="Save" icon="save" class="btn-primary" />
                        <x-button.button-link class="btn btn-dark text-white" title="Go Back" icon="arrow-left"
                            url="{{ route('admin.departemen.index') }}">
                        </x-button.button-link>
                    </form>
                </x-card.card>
            </div>
        </div>
    </div>
@endsection
