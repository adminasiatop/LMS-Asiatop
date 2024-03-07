@extends('layouts.backend.master')

@section('title', 'Identifikasi Coaching')

@section('content')
    <div class="container-xxl">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('admin.identifikasicoaching.create') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-plus mr-2"></i> Create New Form Coaching Identify
                </a>

                <x-card.card-action title="List Coaching Identify" url="{{ route('admin.identifikasicoaching.index') }}">
                    <x-table.table-responsive>
                        <thead>
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Nama Coach</th>
                                <th rowspan="2">Nama Coachee</th>
                                <th rowspan="2">Tanggal Pelaksanaan</th>
                                <th rowspan="2">Permasalahan yang dihadapi Coachee</th>
                                <th rowspan="2">Strategi/Tindakan jangka pendek yang sudah dilakukan oleh Coachee </th>
                                <th rowspan="2">Rencana Improvement yang akan dilakukan</th>
                                <th colspan="6">Rekomendasi Coaching yang diajukan oleh Coach untuk Coachee </th>
                                <th rowspan="2">Goal</th>
                                <th rowspan="2">Reality</th>
                                <th rowspan="2">Opsi</th>
                                <th rowspan="2">Will</th>
                                <th colspan="6">Penilaian Terhadap Coachee</th>
                                <th rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th>Coaching One on One</th>
                                <th>Training Enhancement</th>
                                <th>Join Field Work (Mentoring)</th>
                                <th>Counseling</th>
                                <th>Meeting</th>
                                <th>Sales Clinic</th>
                                <th>Coaching One on One</th>
                                <th>Training Enhancement</th>
                                <th>Join Field Work (Mentoring)</th>
                                <th>Counseling</th>
                                <th>Meeting</th>
                                <th>Sales Clinic</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($identifikasicoaching as $identifikasicoaching)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $identifikasicoaching->coachName }}</td>
                                    <td>{{ $identifikasicoaching->coacheeName }}</td>
                                    <td>{{ $identifikasicoaching->tanggal }}</td>
                                    <td>{{ $identifikasicoaching->permasalahan }}</td>
                                    <td>{{ $identifikasicoaching->strategi }}</td>
                                    <td>{{ $identifikasicoaching->rencana }}</td>
                                    <td>
                                        @if ($identifikasicoaching->r_coaching == 1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td>
                                        @if ($identifikasicoaching->r_enhancement == 1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td>
                                        @if ($identifikasicoaching->r_mentoring == 1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td>
                                        @if ($identifikasicoaching->r_counseling == 1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td>
                                        @if ($identifikasicoaching->r_meeting == 1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td>
                                        @if ($identifikasicoaching->r_clinic == 1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td>{{ $identifikasicoaching->goal }}</td>
                                    <td>{{ $identifikasicoaching->reality }}</td>
                                    <td>{{ $identifikasicoaching->opsi }}</td>
                                    <td>{{ $identifikasicoaching->will }}</td>
                                    <td>
                                        @if ($identifikasicoaching->p_leadership == 3)
                                            Baik
                                        @elseif ($identifikasicoaching->p_leadership == 2)
                                            Sedang
                                        @elseif ($identifikasicoaching->p_leadership == 1)
                                            Kurang
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if ($identifikasicoaching->p_developforothers == 3)
                                            Baik
                                        @elseif ($identifikasicoaching->p_developforothers == 2)
                                            Sedang
                                        @elseif ($identifikasicoaching->p_developforothers == 1)
                                            Kurang
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if ($identifikasicoaching->p_timemanagement == 3)
                                            Baik
                                        @elseif ($identifikasicoaching->p_timemanagement == 2)
                                            Sedang
                                        @elseif ($identifikasicoaching->p_timemanagement == 1)
                                            Kurang
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if ($identifikasicoaching->p_transferknowledge == 3)
                                            Baik
                                        @elseif ($identifikasicoaching->p_transferknowledge == 2)
                                            Sedang
                                        @elseif ($identifikasicoaching->p_transferknowledge == 1)
                                            Kurang
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if ($identifikasicoaching->p_monitoringlaporanteam == 3)
                                            Baik
                                        @elseif ($identifikasicoaching->p_monitoringlaporanteam == 2)
                                            Sedang
                                        @elseif ($identifikasicoaching->p_monitoringlaporanteam == 1)
                                            Kurang
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if ($identifikasicoaching->p_idealhabits == 3)
                                            Baik
                                        @elseif ($identifikasicoaching->p_idealhabits == 2)
                                            Sedang
                                        @elseif ($identifikasicoaching->p_idealhabits == 1)
                                            Kurang
                                        @else
                                            -
                                        @endif
                                    </td>
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
