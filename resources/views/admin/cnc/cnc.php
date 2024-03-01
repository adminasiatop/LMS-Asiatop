@extends('layouts.backend.master')

@section('title', 'Cnc')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('admin.cnc.create') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-plus mr-2"></i> Create New cnc
                </a>
                <x-card.card-action title="List cnc" url="{{ route('admin.cnc.index') }}">
                    <x-table.table-responsive>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cover</th>
                                <th>Name</th>
                                <th>Tags</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cnc as $i => $data)
                                <tr>
                                    <td>{{ $i + $cnc->firstItem() }}</td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#modal-simple{{ $data->id }}"
                                            class="avatar rounded me-2" style="background-image: url({{ $data->cover }})">
                                        </a>
                                        <x-modal.modal id="{{ $data->id }}" title="Cover : {{ $data->name }}">
                                            <img src="{{ $data->cover }}" alt="{{ $data->name }}"
                                                class="img-fluid" />
                                        </x-modal.modal>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.cnc.show', $data->slug) }}" class="text-dark">
                                            {{ $data->name }}
                                        </a>
                                    </td>
                                    <td>
                                        @foreach ($data->tags as $tag)
                                            <li>
                                                <span class="badge bg-{{ $tag->color }}">
                                                    {{ $tag->name }}
                                                </span>
                                            </li>
                                        @endforeach
                                    </td>
                                    <td>Rp. {{ number_format($data->price) }}</td>
                                    <td class="text-muted">
                                        {{ $data->status == '1' ? 'Completed' : 'Developed' }}
                                    </td>
                                    <td>
                                        <x-button.button-dropdown title="Actions" class="btn btn-primary" icon="list">
                                            <x-button.button-link class="dropdown-item" title="Add Video"
                                                url="{{ route('admin.videos.create', $data->slug) }}"
                                                icon="play-circle" />
                                            <x-button.button-link class="dropdown-item" title="Edit "
                                                url="{{ route('admin.cnc.edit', $data->slug) }}" icon="edit" />
                                            <x-button.button-delete id="{{ $data->id }}"
                                                url="{{ route('admin.cnc.destroy', $data->id) }}" title="Delete"
                                                class="dropdown-item" />
                                        </x-button.button-dropdown>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </x-table.table-responsive>
                </x-card.card-action>
            </div>
        </div>
    </div>
@endsection
