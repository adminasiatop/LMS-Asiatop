@extends('layouts.backend.master')

@section('title', 'Edit Event')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <x-card.card title="Create New Event">
                    <form action="{{ route('admin.event.update', $event->slug) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <x-form.input type="text" title="Event Name" name="name" value="{{ $event->name }}"
                            placeholder="Input event name" />

                        <img src="{{ $event->cover }}" alt="{{ $event->name }}" class="img-fluid mb-3 " width="20%" />
                        <x-form.input type="file" title="Event cover" name="cover" value="{{ $event->cover }}"
                            placeholder="" />
                        <x-form.textarea title="Event Description" name="description" placeholder="">
                            {{ $event->description }}
                        </x-form.textarea>
                        {{-- <div class="row">
                            <div class="col-6">
                                <x-form.select-group title="Event Level">
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="level" value="Beginner" class="form-selectgroup-input"
                                            {{ $event->level == 'Beginner' ? 'checked' : '' }}>
                                        <span class="form-selectgroup-label">
                                            Beginner
                                        </span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="level" value="Intermediate" class="form-selectgroup-input"
                                            {{ $event->level == 'Intermediate' ? 'checked' : '' }}>
                                        <span class="form-selectgroup-label">
                                            Intermediate
                                        </span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="level" value="Advanced" class="form-selectgroup-input"
                                            {{ $event->level == 'Advanced' ? 'checked' : '' }}>
                                        <span class="form-selectgroup-label">
                                            Advanced
                                        </span>
                                    </label>
                                </x-form.select-group>
                            </div>
                            <div class="col-6">
                                <x-form.checkbox title="Event Status">
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="status" value="0"
                                            {{ $event->status == '0' ? 'checked' : '' }}>
                                        <span class="form-check-label">Developed</span>
                                    </label>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="status" value="1"
                                            {{ $event->status == '1' ? 'checked' : '' }}>
                                        <span class="form-check-label">Completed</span>
                                    </label>
                                </x-form.checkbox>
                            </div>
                        </div> --}}
                        <x-button.button-save title="Save" icon="save" class="btn-primary" />
                        <x-button.button-link class="btn btn-dark text-white" title="Go Back" icon="arrow-left"
                            url="{{ route('admin.event.index') }}">
                        </x-button.button-link>
                    </form>
                </x-card.card>
            </div>
        </div>
    </div>
@endsection
