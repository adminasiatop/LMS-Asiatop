@extends('layouts.backend.master')

@section('title', 'Daftar Karyawan')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('admin.karyawan.create') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-plus mr-2"></i> Create New Karyawan
                </a>
                <x-card.card-action title="List Karyawan" url="{{ route('admin.karyawan.index') }}">
                    <x-table.table-responsive>
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>Nama </th>
                                <th>Jabatan</th>
                                <th>Status</th>
                                <th>DivisiID</th>
                                <th>DepartemenID</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($karyawan as $karyawan)
                                <tr>
                                    <td>{{ $karyawan->nik }}</td>
                                    <td>{{ $karyawan->nama }}</td>
                                    <td>{{ $karyawan->jabatan }}</td>
                                    <td>{{ $karyawan->status }}</td>
                                    <td>
                                        @foreach ($karyawan->divisi()->get() as $divisi)
                                            {{ $divisi->divisiName }}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($karyawan->departemen()->get() as $departemen)
                                            {{ $departemen->departemenName }}
                                        @endforeach
                                    </td>
                                    <td>
                                        <x-button.button-dropdown title="Actions" class="btn btn-primary" icon="list">
                                            <x-button.button-link class="dropdown-item" title="Edit "
                                                url="{{ route('admin.karyawan.edit' , $karyawan->id) }}" icon="edit" />
                                            <x-button.button-delete id="{{ $karyawan->id }}"
                                                url="{{ route('admin.karyawan.destroy', $karyawan->id) }}" title="Delete"
                                                class="dropdown-item" />
                                        </x-button.button-dropdown>
                                    </td>
                                </tr>
                         @empty
                            <div class="alert alert-danger">
                            Data Karyawan belum Tersedia.
                            </div>
                        @endforelse
                        </tbody>
                    </x-table.table-responsive>
                   
                </x-card.card-action>
            </div>
        </div>
    </div>
@endsection
