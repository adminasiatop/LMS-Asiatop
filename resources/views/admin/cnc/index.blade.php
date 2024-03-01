@extends('layouts.backend.master')

@section('title', 'Identifikasi Coaching')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('admin.cnc.create') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-plus mr-2"></i> Create New Form Identifikasi Coaching
                </a>
                <x-card.card-action title="List Identifikasi Coaching" url="{{ route('admin.cnc.index') }}">
                    <x-table.table-responsive>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Coachee</th>
                                <th>Jabatan</th>
                                <th>Nama Coach</th>
                                <th>Jabatan</th>
                                <th>Tanggal Pelaksanaan</th>
                                <th>Permasalahan yang dihadapi Coachee</th>
                                <th>Strategi/Tindakan jangka pendek yang sudah dilakukan oleh Coachee </th>
                                <th>Rencana Improvement yang akan dilakukan</th>
                                <th>Rekomendasi Coaching yang diajukan oleh Coach untuk Coachee </th>
                                <th>Penilaian Terhadap Coachee</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(isset($cnc))
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
                                                url="{{ route('admin.cnc.create', $data->slug) }}"
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
                        @endif
                        </tbody>
                    </x-table.table-responsive>
                </x-card.card-action>
            </div>
        </div>
    </div>
@endsection
