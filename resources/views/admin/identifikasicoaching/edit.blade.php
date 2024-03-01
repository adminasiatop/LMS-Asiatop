@extends('layouts.backend.master')

@section('title', 'Edit Series')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <x-card.card title="Edit Identifikasi Coaching">
                    <form action="{{ route('admin.identifikasicoaching.update', $Identifikasicoaching->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- <x-form.input type="text" title="Identifikasi Coaching" name="name" value="{{ $Identifikasicoaching->name }}"
                            placeholder="Input series name" /> --}}
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
                                <x-form.input type="date" title="Tanggal Pelaksanaan" name="tanggal" value=""
                                    placeholder="Input cnc Coachee" />
                            </div>
                        </div>
                        <div title="iGROW"
                            style="background-color: #f0f0f0; padding: 10px; border-radius: 5px; text-align: center;">
                            <p style="margin: 0; padding: 5px; font-weight: bold;">iGrow</p>
                            <p style="margin: 0; padding: 5px;">Be Present - Fokuskan perhatian anda pada klien, hadir
                                sepenuhnya untuk mendengarkan dan merespon.</p>
                            <p style="margin: 0; padding: 5px;">Be Patient - Sabar, kendalikan emosi, tidak terburu-buru
                                berusaha mendapatkan solusi.</p>
                            <p style="margin: 0; padding: 5px;">Be Curious - Bangun rasa ingin tahu, menahan diri dari
                                keinginan untuk menasehati atau memberikan saran.</p>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <x-form.textarea type="text" title="Goal" name="goal" value="Goal"
                                    placeholder="Goal">
                                    {{ $Identifikasicoaching->goal }}
                                </x-form.textarea>
                            </div>
                            <div class="col-3">
                                <x-form.textarea type="text" title="Reality" name="reality" value="Reality"
                                    placeholder="Reality">
                                    {{ $Identifikasicoaching->reality }}
                                </x-form.textarea>
                            </div>
                            <div class="col-3">
                                <x-form.textarea type="text" title="Options" name="opsi" value="Options"
                                    placeholder="Options">
                                    {{ $Identifikasicoaching->opsi }}
                                </x-form.textarea>
                            </div>
                            <div class="col-3">
                                <x-form.textarea type="text" title="Will" name="will" value="Will"
                                    placeholder="Will">
                                    {{ $Identifikasicoaching->will }}
                                </x-form.textarea>
                            </div>
                        </div>
                        <x-form.textarea title="Permasalahan yang di hadapi Coachee " name="permasalahan"
                            value="Permasalahan yang di hadapi Coachee" placeholder="">
                            {{ $Identifikasicoaching->permasalahan }}
                        </x-form.textarea>
                        <x-form.textarea title="Strategi/Tindakan jangka pendek yang sudah dilakukan oleh Coachee "
                            name="strategi" value="Strategi/Tindakan jangka pendek yang sudah dilakukan oleh Coachee "
                            placeholder="">
                            {{ $Identifikasicoaching->strategi }}
                        </x-form.textarea>
                        <x-form.textarea title="Rencana Improvement yang akan dilakukan" name="rencana" value=""
                            placeholder="">
                            {{ $Identifikasicoaching->rencana }}
                        </x-form.textarea>
                        <div class="row">
                            <div class="col-6">
                                <x-form.checkbox title="Rekomendasi Coaching yang diajukan oleh Coach untuk Coachee">
                                <label class="form-check">
                                    <input class="form-check-input @error('status') is-invalid @enderror" type="checkbox"
                                        name="rekomendasi" value="1">
                                    <span class="form-check-label">Coaching one on one</span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input @error('status') is-invalid @enderror" type="checkbox"
                                        name="enhancement" value="1">
                                    <span class="form-check-label">Training Enhancement</span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input @error('status') is-invalid @enderror" type="checkbox"
                                        name="mentoring" value="1">
                                    <span class="form-check-label">Join Field Work (Mentoring)</span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input @error('status') is-invalid @enderror" type="checkbox"
                                        name="counseling" value="1">
                                    <span class="form-check-label">Counseling</span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input @error('status') is-invalid @enderror" type="checkbox"
                                        name="meeting" value="1">
                                    <span class="form-check-label">Meeting</span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input @error('status') is-invalid @enderror" type="checkbox"
                                        name="clinic" value="1">
                                    <span class="form-check-label">Sales Clinic</span>
                                </label>
                                </x-form.checkbox>
                            </div>
                            <div class="col-lg-6">
                                <x-form.checkbox title="Penilaian Terhadap Coachee">
                                    <table class="table table-borderless table-md table-responsive">
                                        <thead>
                                            <tr>
                                                <th scope="col">Kategori</th>
                                                <th scope="col">Penilaian</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Leadership</td>
                                                <td>
                                                    <select class="form-select form-select-sm" name="leadership"
                                                        id="leadership">
                                                        <option selected>Pilih</option>
                                                        <option value="3">Baik</option>
                                                        <option value="2">Sedang</option>
                                                        <option value="1">Kurang</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Develop for Others</td>
                                                <td>
                                                    <select class="form-select form-select-sm" name="developforothers"
                                                        id="developforothers">
                                                        <option selected>Pilih</option>
                                                        <option value="3">Baik</option>
                                                        <option value="2">Sedang</option>
                                                        <option value="1">Kurang</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            </td>
                                            </tr>
                                            <tr>
                                                <td>Time Management</td>
                                                <td>
                                                    <select class="form-select form-select-sm" name="timemanagement"
                                                        id="timemanagement">
                                                        <option selected>Pilih</option>
                                                        <option value="3">Baik</option>
                                                        <option value="2">Sedang</option>
                                                        <option value="1">Kurang</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Transfer Knowledge</td>
                                                <td>
                                                    <select class="form-select form-select-sm" name="transferknowledge"
                                                        id="transferknowledge">
                                                        <option selected>Pilih</option>
                                                        <option value="3">Baik</option>
                                                        <option value="2">Sedang</option>
                                                        <option value="1">Kurang</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Monitoring Laporan Team</td>
                                                <td>
                                                    <select class="form-select form-select-sm"
                                                        name="monitoringlaporanteam" id="monitoringlaporanteam">
                                                        <option selected>Pilih</option>
                                                        <option value="3">Baik</option>
                                                        <option value="2">Sedang</option>
                                                        <option value="1">Kurang</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Ideal Habits</td>
                                                <td>
                                                    <select class="form-select form-select-sm" name="idealhabits"
                                                        id="idealhabits">
                                                        <option selected>Pilih</option>
                                                        <option value="3">Baik</option>
                                                        <option value="2">Sedang</option>
                                                        <option value="1">Kurang</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </x-form.checkbox>
                            </div>
                        </div>
                        <x-button.button-save title="Save" icon="save" class="btn btn-primary" />
                        <x-button.button-link class="btn btn-dark text-white" title="Go Back" icon="arrow-left"
                            url="{{ route('admin.identifikasicoaching.index') }}">
                        </x-button.button-link>
                        {{-- </form> --}}
                </x-card.card>
            </div>
        </div>
    </div>
@endsection
