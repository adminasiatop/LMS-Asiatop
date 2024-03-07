@extends('layouts.backend.master')

@section('title', 'Divisi')

@section('content')
<div class="container-xl">
    <div class="row">
        <div class="col-12">
            <x-card.card title="Form Input divisi">
                <form action="{{ route('admin.divisi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <x-form.input class="col-3 col-md-3" type="text" title="Kode Divisi" name="divisiCd" value="" placeholder="Input kode divisi" />
                        </div>
                        <div class="col-3">
                            <x-form.input class="col-3 col-md-3" type="text" title="Nama divisi" name="divisiName" value="" placeholder="Input Nama divisi" />
                        </div>
                    </div>
                    <x-button.button-save title="Save" icon="save" class="btn btn-primary" />
                    <x-button.button-link class="btn btn-dark text-white" title="Go Back" icon="arrow-left" url="{{ route('admin.divisi.index') }}">
                    </x-button.button-link>
                </form>
            </x-card.card>
        </div>
    </div>
</div>
@endsection