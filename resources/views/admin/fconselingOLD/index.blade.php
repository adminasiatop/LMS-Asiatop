@extends('layouts.backend.master')

@section('title', 'Form Counseling')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('admin.fconseling.create') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-plus mr-2"></i> Create New Form Counseling
                </a>
                <x-card.card-action title="List Form Counseling" url="{{ route('admin.fconseling.index') }}">
                    <x-table.table-responsive>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Counsele</th>
                                <th>Jabatan Counsele</th>
                                <th>Nama Konselor</th>
                                <th>Jabatan Koselor</th>
                                <th>Tanggal</th>
                                <th>Topik Counseling</th>
                                <th>Respon Counsele</th>
                                <th>Follow Up</th>
                                <th>Kriteria Keberhasilan</th>
                                <th>Target</th>
                                <th>Hasil</th>
                                <th>Summary</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($fconseling))
                            @foreach ($fconseling as $i => $data)
                                <tr>
                                    <td>{{ $i + $fconseling->firstItem() }}</td>
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
                                        <a href="{{ route('admin.fconseling.show', $data->slug) }}" class="text-dark">
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
                                                url="{{ route('admin.fconseling.create', $data->slug) }}"
                                                icon="play-circle" />
                                            <x-button.button-link class="dropdown-item" title="Edit "
                                                url="{{ route('admin.fconseling.edit', $data->slug) }}" icon="edit" />
                                            <x-button.button-delete id="{{ $data->id }}"
                                                url="{{ route('admin.fconseling.destroy', $data->id) }}" title="Delete"
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
