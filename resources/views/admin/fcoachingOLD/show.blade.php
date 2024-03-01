@extends('layouts.backend.master')

@section('title', 'List Video')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <x-card.card title="List Videos - {{ $fcoaching->name }}">
                    <x-card.card-list>
                        @forelse($videos as $i => $video)
                            <x-card.card-list-item title="{{ $video->name }}" eps="{{ $video->episode }}"
                                duration="{{ $video->duration }}" intro="{{ $video->intro }}">
                                <x-button.button-link class="dropdown-item" title="Edit "
                                    url="{{ route('admin.videos.edit', [$fcoaching->slug, $video->video_code]) }}"
                                    icon="edit" />
                                <x-button.button-delete id="{{ $video->id }}"
                                    url="{{ route('admin.videos.destroy', $video->id) }}" title="Delete"
                                    class="dropdown-item" />
                            </x-card.card-list-item>
                        @empty
                            <x-alert.alert-danger title="This fcoaching don't have any video" subTitle="Create new video"
                                url="{{ route('admin.videos.create', $fcoaching->slug) }}" icon="play-circle" />
                        @endforelse
                    </x-card.card-list>
                </x-card.card>
            </div>
        </div>
    </div>
@endsection
