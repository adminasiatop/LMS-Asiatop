@extends('layouts.backend.master')

@section('title', 'Daftar divisi')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('admin.divisi.create') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-plus mr-2"></i> Create New divisi
                </a>
                <x-card.card-action title="Data Divisi" url="{{ route('admin.divisi.index') }}">
                    <x-table.table-responsive>
                        <thead>
                            <tr>
                                <th>Divisi COde</th>
                                <th>Nama Divisi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($divisi as $divisi)
                             <tr>
                                <td>{{ $divisi->divisiCd }}</td>
                                <td>{{ $divisi->divisiName }}</td>
                                    <td>
                                        <x-button.button-dropdown title="Actions" class="btn btn-primary" icon="list">
                                            <x-button.button-link class="dropdown-item" title="Edit "
                                                url="{{ route('admin.divisi.edit' , $divisi->id) }}" icon="edit" />
                                            <x-button.button-delete id="{{ $divisi->id }}"
                                                url="{{ route('admin.divisi.destroy', $divisi->id) }}" title="Delete"
                                                class="dropdown-item" />
                                        </x-button.button-dropdown>
                                    </td>
                                </tr>
                         @empty
                            <div class="alert alert-danger">
                            Data divisi belum Tersedia.
                            </div>
                        @endforelse
                        </tbody>
                    </x-table.table-responsive>
                   
                </x-card.card-action>
            </div>
        </div>
    </div>
@endsection
