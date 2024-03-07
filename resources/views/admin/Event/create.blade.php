@extends('layouts.backend.master')

@section('title', 'Create Event')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <x-card.card title="Create New Event">
                    <form action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-form.input type="text" title="Event Name" name="name" value=""
                            placeholder="Input Event name" />

                        <x-form.input type="file" title="Event cover" name="cover" value="" placeholder="" />
                        <x-form.textarea title="Series Description" name="description" value=""
                            placeholder="Input series description" />
                        <x-button.button-save title="Save" icon="save" class="btn btn-primary" />
                        <x-button.button-link class="btn btn-dark text-white" title="Go Back" icon="arrow-left"
                            url="{{ route('admin.event.index') }}">
                        </x-button.button-link>
                    </form>
                </x-card.card>
            </div>
        </div>
    </div>
@endsection
