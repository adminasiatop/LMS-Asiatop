@extends('layouts.backend.master')

@section('title', 'Identifikasi Coaching')

@section('content')
    <div class="container-xxl">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('admin.identifikasicoaching.create') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-plus mr-2"></i> Create New Form Identifikasi Coaching
                </a>
                <x-card.card-action title="List Identifikasi Coaching" url="{{ route('admin.identifikasicoaching.index') }}">
                    <x-table.table-responsive>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Coach</th>
                                <th>Nama Coachee</th>
                                <th>Tanggal Pelaksanaan</th>
                                <th>Permasalahan yang dihadapi Coachee</th>
                                <th>Strategi/Tindakan jangka pendek yang sudah dilakukan oleh Coachee </th>
                                <th>Rencana Improvement yang akan dilakukan</th>
                                <th>Rekomendasi Coaching yang diajukan oleh Coach untuk Coachee </th>
                                <th>Goal</th>
                                <th>Reality</th>
                                <th>Opsi</th>
                                <th>Will</th>
                                <th>Penilaian Terhadap Coachee</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($identifikasicoaching as $identifikasicoaching)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $identifikasicoaching->coachName }}</td>
                                    <td>{{ $identifikasicoaching->coacheeName }}</td>
                                    <td>{{ $identifikasicoaching->tanggal }}</td>
                                    <td>{{ $identifikasicoaching->permasalahan }}</td>
                                    <td>{{ $identifikasicoaching->strategi }}</td>
                                    <td>{{ $identifikasicoaching->rencana }}</td>
                                    <td>{{ $identifikasicoaching->rekomendasi }}</td>
                                    <td>{{ $identifikasicoaching->goal }}</td>
                                    <td>{{ $identifikasicoaching->reality }}</td>
                                    <td>{{ $identifikasicoaching->opsi }}</td>
                                    <td>{{ $identifikasicoaching->will }}</td>
                                    <td>{{ $identifikasicoaching->penilaian }}</td>
                                    <td>
                                        <x-button.button-dropdown title="Actions" class="btn btn-primary" icon="list">
                                            <x-button.button-link class="dropdown-item" title="Edit "
                                                url="{{ route('admin.identifikasicoaching.edit', $identifikasicoaching->id) }}"
                                                icon="edit" />
                                            <x-button.button-delete id="{{ $identifikasicoaching->id }}"
                                                url="{{ route('admin.identifikasicoaching.destroy', $identifikasicoaching->id) }}"
                                                title="Delete" class="dropdown-item" />
                                        </x-button.button-dropdown>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Identifikasi Coaching belum Tersedia.
                                </div>
                            @endforelse

                        </tbody>
                    </x-table.table-responsive>
                </x-card.card-action>
            </div>
        </div>
    </div>
@endsection
