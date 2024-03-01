@extends('layouts.backend.master')

@section('title', 'Form Coaching')

@section('content')
<div class="container-xxl">
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.coaching.create') }}" class="btn btn-primary mb-3">
                <i class="fas fa-plus mr-2"></i> Create New Form Coaching
            </a>
            <x-card.card-action title="List Form Coaching" url="{{ route('admin.coaching.index') }}">
                <x-table.table-responsive>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Coach</th>
                            <th>Nama Coachee</th>
                            <th>Tanggal Pelaksanaan</th>
                            <th>Topik Coaching</th>
                            <th>Poin-poin utama yang dibahas</th>
                            <th>Indikator Keberhasilan/Target</th>
                            <th>Area Improvement</th>
                            <th>Support System</th>
                            <th>Goal</th>
                            <th>Reality</th>
                            <th>Opsi</th>
                            <th>Will</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($coaching as $coachings)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $coachings->coachName }}</td>
                            <td>{{ $coachings->coacheeName }}</td>
                            <td>{{ $coachings->tanggal}}</td>
                            <td>{{ $coachings->topik}}</td>
                            <td>{{ $coachings->point}}</td>
                            <td>{{ $coachings->indikator}}</td>
                            <td>{{ $coachings->improvement}}</td>
                            <td>{{ $coachings->support}}</td>
                            <td>{{ $coachings->goal }}</td>
                            <td>{{ $coachings->reality }}</td>
                            <td>{{ $coachings->opsi }}</td>
                            <td>{{ $coachings->will }}</td>
                            <td>
                                <x-button.button-dropdown title="Actions" class="btn btn-primary" icon="list">
                                    <x-button.button-link class="dropdown-item" title="Edit " url="{{ route('admin.coaching.edit' , $coachings->id) }}" icon="edit" />
                                    <x-button.button-delete id="{{ $coachings->id }}" url="{{ route('admin.coaching.destroy', $coachings->id) }}" title="Delete" class="dropdown-item" />
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