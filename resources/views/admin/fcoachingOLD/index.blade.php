@extends('layouts.backend.master')

@section('title', 'Form Coaching')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('admin.fcoaching.create') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-plus mr-2"></i> Create New Form Coaching
                </a>
                <x-card.card-action title="List Form Coaching" url="{{ route('admin.fcoaching.index') }}">
                    <x-table.table-responsive>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Coachee</th>
                                <th>Jabatan</th>
                                <th>Nama Coach</th>
                                <th>Jabatan</th>
                                <th>Tanggal Pelaksanaan</th>
                                <th>Topik Coaching</th>
                                <th>Poin-poin utama yang dibahas</th>
                                <th>Indikator Keberhasilan/Target</th>
                                <th>Area Improvement</th>
                                <th>Support System</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(isset($fcoaching))
                            @foreach ($fcoaching as $i => $data)
                                <tr>
                                    <td>{{ $i + $fcoaching->firstItem() }}</td>
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
                                        <a href="{{ route('admin.fcoaching.show', $data->slug) }}" class="text-dark">
                                            {{ $data->name }}
                                        </a>
                                    </td>
                                    <td>
                                    @if(isset($tags))
                                        @foreach ($tags ?? [] as $tag)
                                            <li>
                                                <span class="badge bg-{{ $tag->color }}">
                                                    {{ $tag->name }}
                                                </span>
                                            </li>
                                        @endforeach
                                    @endisset 
                                    </td>
                                    <td>Rp. {{ number_format($data->price) }}</td>
                                    <td class="text-muted">
                                        {{ $data->status == '1' ? 'Completed' : 'Developed' }}
                                    </td>
                                    <td>
                                        <x-button.button-dropdown title="Actions" class="btn btn-primary" icon="list">
                                            <x-button.button-link class="dropdown-item" title="Add Video"
                                                url="{{ route('admin.fcoaching.create', $data->slug) }}"
                                                icon="play-circle" />
                                            <x-button.button-link class="dropdown-item" title="Edit "
                                                url="{{ route('admin.fcoaching.edit', $data->slug) }}" icon="edit" />
                                            <x-button.button-delete id="{{ $data->id }}"
                                                url="{{ route('admin.fcoaching.destroy', $data->id) }}" title="Delete"
                                                class="dropdown-item" />
                                        </x-button.button-dropdown>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </x-table.table-responsive>
                </x-card.card-action>
            </div>
        </div>
    </div>
@endsection
