@extends('layouts.backend.master')

@section('title', 'Form Coaching')

@section('content')
<div class="container-xl">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.identifikasicoaching.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-3">
                        <label for="position-option">Coach Name</label>
                        <select class="form-control" id="coachkaryawanID-option" name="coachkaryawanID">
                            @foreach ($karyawan as $karyawan)
                            <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="position-option">Coachee Name</label>
                        <select class="form-control" id="coacheekaryawanID-option" name="coacheekaryawanID">
                            @foreach ($karyawanb as $karyawanb)
                            <option value="{{ $karyawanb->id }}">{{ $karyawanb->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <x-form.input type="date" title="Tanggal Pelaksanaan" name="tanggal" value="" placeholder="Input cnc Coachee" />
                    </div>
                </div>
                <div title="iGROW" style="background-color: #f0f0f0; padding: 10px; border-radius: 5px; text-align: center;">
                    <p style="margin: 0; padding: 5px; font-weight: bold;">iGrow</p>
                    <p style="margin: 0; padding: 5px;">Be Present - Fokuskan perhatian anda pada klien, hadir sepenuhnya untuk mendengarkan dan merespon.</p>
                    <p style="margin: 0; padding: 5px;">Be Patient - Sabar, kendalikan emosi, tidak terburu-buru berusaha mendapatkan solusi.</p>
                    <p style="margin: 0; padding: 5px;">Be Curious - Bangun rasa ingin tahu, menahan diri dari keinginan untuk menasehati atau memberikan saran.</p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection