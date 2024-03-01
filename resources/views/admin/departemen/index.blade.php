@extends('layouts.backend.master')

@section('title', 'Daftar departemen')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('admin.departemen.create') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-plus mr-2"></i> Create New departemen
                </a>
                <x-card.card-action title="Data departemen" url="{{ route('admin.departemen.index') }}">
                    <x-table.table-responsive>
                        <thead>
                            <tr>
                                <th>Departemen Code</th>
                                <th>Nama departemen</th>
                                <th>Divisi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($departemen as $departemen)
                             <tr>   
                                <td>{{ $departemen->departemenCD }}</td>
                                <td>{{ $departemen->departemenName }}</td>
                                <td>
                                    @foreach ($departemen->divisi()->get() as $divisi)
                                        {{ $divisi->divisiName }}
                                    @endforeach    
                                </td>
                                <td>
                                        <x-button.button-dropdown title="Actions" class="btn btn-primary" icon="list">
                                            <x-button.button-link class="dropdown-item" title="Edit "
                                                url="{{ route('admin.departemen.edit' , $departemen->id) }}" icon="edit" />
                                        <x-button.button-delete id="{{ $departemen->id }}"
                                                url="{{ route('admin.departemen.destroy', $departemen->id) }}" title="Delete"
                                                class="dropdown-item" />
                                        </x-button.button-dropdown>
                                </td>
                            </tr>
                         @empty
                            <div class="alert alert-danger">
                            Data departemen belum Tersedia.
                            </div>
                        @endforelse
                        </tbody>
                    </x-table.table-responsive>
                   
                </x-card.card-action>
            </div>
        </div>
    </div>
@endsection
