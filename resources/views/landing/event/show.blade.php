@extends('layouts.frontend.master')

@section('title')
    {{ $event->name }}
@endsection

@section('content')
    {{-- <div class="container-xl">
        <div class="row">
            <div class="col-12 col-lg-12">
                <x-card.card-description>
                    <div class="row">
                        <div class="col-7">
                            <div class="ribbon bg-red">New</div>
                            <h3 class="card-title">{{ $event->name }}</h3>
                            <p class="card-text">{{ $event->description }}</p>

                        </div>
                        <div class="col-5">
                            <img src="{{ $event->cover }}" class="img-fluid" />
                        </div>
                    </div>
                </x-card.card-description>
            </div>
            <div class="col-12">
                <x-card.card title="List Videos - {{ $event->name }}">
                    <div class="list-group list-group-flush">
                        @foreach ($videos as $video)
                            <a href="{{ route('event.video', [$event->slug, $video->episode]) }}"
                                class="list-group-item list-group-item-action" aria-current="true">
                                Eps - {{ $video->episode }} {{ $video->name }}
                                <span class="badge bg-{{ $video->intro == 1 ? 'azure' : 'red' }} ml-1">
                                    {{ $video->intro == 1 ? 'free' : 'pro' }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </x-card.card>
            </div>
        </div>
    </div> --}}
@endsection
