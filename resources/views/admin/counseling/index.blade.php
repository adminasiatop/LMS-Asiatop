@extends('layouts.backend.master')

@section('title', 'Form Counseling')

@section('content')
<div class="container-xxl">
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.counseling.create') }}" class="btn btn-primary mb-3">
                <i class="fas fa-plus mr-2"></i> Create New Form Counseling
            </a>
            <x-card.card-action title="List Form Counseling" url="{{ route('admin.counseling.index') }}">
                <x-table.table-responsive>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Counsele</th>
                            <th>Nama Konselor</th>
                            <th>Tanggal Pelaksanaan</th>
                            <th>Topik Counseling</th>
                            <th>Respon Counsele</th>
                            <th>Follow Up</th>
                            <th>Target</th>
                            <th>Hasil</th>
                            <th>Summary</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($counseling as $counselings)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $counselings->coachName }}</td>
                            <td>{{ $counselings->coacheeName }}</td>
                            <td>{{ $counselings->tanggal}}</td>
                            <td>{{ $counselings->topikkonseling}}</td>
                            <td>{{ $counselings->responsekonseling}}</td>
                            <td>{{ $counselings->fukonseling}}</td>
                            <td>{{ $counselings->targetkonseling}}</td>
                            <td>{{ $counselings->hasilkonseling}}</td>
                            <td>{{ $counselings->summary}}</td>
                            <td>
                                <x-button.button-dropdown title="Actions" class="btn btn-primary" icon="list">
                                    <x-button.button-link class="dropdown-item" title="Edit " url="{{ route('admin.counseling.edit' , $counselings->id) }}" icon="edit" />
                                    <x-button.button-delete id="{{ $counselings->id }}" url="{{ route('admin.counseling.destroy', $counselings->id) }}" title="Delete" class="dropdown-item" />
                                </x-button.button-dropdown>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger">
                            Data Identifikasi Counseling belum Tersedia.
                        </div>
                        @endforelse

                    </tbody>
                </x-table.table-responsive>
            </x-card.card-action>
        </div>
    </div>
</div>
@endsection