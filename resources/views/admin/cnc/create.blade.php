@extends('layouts.backend.master')

@section('title', 'Form Identifikasi Coaching')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <x-card.card title="Form Identifikasi Coaching">
                    <form action="{{ route('admin.cnc.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-6">
                                
                                <x-form.input class="col-3 col-md-3" type="text" title="Nama Coachee" name="Coachee" value=""
                                placeholder="Input Nama Coachee"/>
                            </div>
                                <div class="col-6">
                                <x-form.input class="col-3 col-md-3" type="text" title="Nama Coach" name="Coach" value=""
                                placeholder="Input Nama Coach"/>
                            </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-6">
                                <x-form.input type="text" title="Jabatan Coachee" name="JabatanCoache" value=""
                            placeholder="Input Jabatan Coachee" />
                            </div>
                                <div class="col-6">
                                <x-form.input type="text" title="Jabatan Coach" name="JabatanCoach" value=""
                            placeholder="Input Jabatan Coach" />
                            </div>
                            </div>
                        <!-- <x-form.input type="file" title="cnc cover" name="cover" value="" placeholder="" /> -->
                            <x-form.input type="date" title="Tanggal Pelaksanaan" name="cnc" value=""
                            placeholder="Input cnc Coachee" />
                        <div title="iGROW" style="background-color: #f0f0f0; padding: 10px; border-radius: 5px; text-align: center;">
                                <p style="margin: 0; padding: 5px; font-weight: bold;">iGrow</p>
                                <p style="margin: 0; padding: 5px;">Be Present - Fokuskan perhatian anda pada klien, hadir sepenuhnya untuk mendengarkan dan merespon.</p>
                                <p style="margin: 0; padding: 5px;">Be Patient - Sabar, kendalikan emosi, tidak terburu-buru berusaha mendapatkan solusi.</p>
                                <p style="margin: 0; padding: 5px;">Be Curious - Bangun rasa ingin tahu, menahan diri dari keinginan untuk menasehati atau memberikan saran.</p>
                        </div>

                        <div class="row">
                            <div class="col-3">
                            <x-form.textarea type="text" title="Goal" name="Goal" value="Goal"
                            placeholder="Goal" />
                            </div>
                            <div class="col-3">
                            <x-form.textarea type="text" title="Reality" name="Reality" value="Reality"
                            placeholder="Reality" />
                            </div>
                            <div class="col-3">
                            <x-form.textarea type="text" title="Options" name="Options" value="Options"
                            placeholder="Options" />
                            </div>
                            <div class="col-3">
                            <x-form.textarea type="text" title="Will" name="Will" value="Will"
                            placeholder="Will" />
                            </div>
                        </div>
                        <x-form.textarea title="Permasalahan yang di hadapi Coachee " name="Permaasalahan" value="Permasalahan yang di hadapi Coachee"
                            placeholder="" />
                        <x-form.textarea title="Strategi/Tindakan jangka pendek yang sudah dilakukan oleh Coachee " name="Strategi" value="Strategi/Tindakan jangka pendek yang sudah dilakukan oleh Coachee "
                            placeholder="" />
                        <x-form.textarea title="Rencana Improvement yang akan dilakukan" name="description" value=""
                            placeholder="" />
                        <div class="row">
                            <div class="col-6">
                                <x-form.select-group title="Rekomendasi Coaching yang diajukan oleh Coach untuk Coachee">
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input @error('status') is-invalid @enderror"
                                            type="checkbox" name="status" value="1">
                                        <span class="form-check-label">Coaching one on one</span>
                                    </label>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input @error('status') is-invalid @enderror"
                                            type="checkbox" name="enhancement" value="1">
                                        <span class="form-check-label">Training Enhancement</span>
                                    </label>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input @error('status') is-invalid @enderror"
                                            type="checkbox" name="mentoring" value="1">
                                        <span class="form-check-label">Join Field Work (Mentoring)</span>
                                    </label>
                                </x-form.select-group>
                                <div class="row-3">
                                <label class="form-check form-check-inline">
                                        <input class="form-check-input @error('status') is-invalid @enderror"
                                            type="checkbox" name="counseling" value="1">
                                        <span class="form-check-label">Counseling</span>
                                    </label>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input @error('status') is-invalid @enderror"
                                            type="checkbox" name="meeting" value="1">
                                        <span class="form-check-label">Meeting</span>
                                    </label>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input @error('status') is-invalid @enderror"
                                            type="checkbox" name="clinic" value="1">
                                        <span class="form-check-label">Sales Clinic</span>
                                    </label>
                                    </div>
                                </label>
                            </div>
                            <div class="col-6">
                                <x-form.checkbox title="Penilaian Terhadap Coachee">
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input @error('status') is-invalid @enderror"
                                            type="textbox" name="status" value="0">
                                        <span class="form-text-box">Developed</span>
                                    </label>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input @error('status') is-invalid @enderror"
                                            type="textbox" name="status" value="1">
                                        <span class="form-text-box">Completed</span>
                                    </label>
                                </x-form.checkbox>
                            </div>
                        </div>
                        <x-button.button-save title="Save" icon="save" class="btn btn-primary" />
                        <x-button.button-link class="btn btn-dark text-white" title="Go Back" icon="arrow-left"
                            url="{{ route('admin.cnc.index') }}">
                        </x-button.button-link>
                    </form>
                </x-card.card>
            </div>
        </div>
    </div>
@endsection
