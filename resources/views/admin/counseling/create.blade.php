@extends('layouts.backend.master')

@section('title', 'Form Counseling')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <x-card.card title="Form Counseling">
                    <form action="{{ route('admin.counseling.store') }}" method="POST" enctype="multipart/form-data">
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
                                <x-form.input type="date" title="Tanggal Pelaksanaan" name="tanggal" value=""
                                    placeholder="Input cnc Coachee" required />
                            </div>
                        </div>
                        <!-- {{-- <div title="iGROW" style="background-color: #f0f0f0; padding: 10px; border-radius: 5px; text-align: center;">
                        <p style="margin: 0; padding: 5px; font-weight: bold;">iGrow</p>
                        <p style="margin: 0; padding: 5px;">Be Present - Fokuskan perhatian anda pada klien, hadir sepenuhnya untuk mendengarkan dan merespon.</p>
                        <p style="margin: 0; padding: 5px;">Be Patient - Sabar, kendalikan emosi, tidak terburu-buru berusaha mendapatkan solusi.</p>
                        <p style="margin: 0; padding: 5px;">Be Curious - Bangun rasa ingin tahu, menahan diri dari keinginan untuk menasehati atau memberikan saran.</p>
                    </div> --}}

                        {{-- <div class="row">
                        <div class="col-3">
                            <x-form.textarea type="text" title="Goal" name="goal" value="Goal" placeholder="Goal" required/>
                        </div>
                        <div class="col-3">
                            <x-form.textarea type="text" title="Reality" name="reality" value="Reality" placeholder="Reality" required/>
                        </div>
                        <div class="col-3">
                            <x-form.textarea type="text" title="Options" name="opsi" value="Options" placeholder="Options" required/>
                        </div>
                        <div class="col-3">
                            <x-form.textarea type="text" title="Will" name="will" value="Will" placeholder="Will" required/>
                        </div>
                    </div> --}} -->
                        <x-form.textarea title="Topik conseling" name="topikkonseling" value="Topik Counseling"
                            placeholder="" required />
                        <x-form.textarea title="Respon Counsele" name="responsekonseling" value="Respon Counsele"
                            placeholder="" required />
                        <x-form.textarea title="Follow Up" name="fukonseling" value="Follow Up" placeholder="" required />
                        <x-form.textarea title="Target" name="targetkonseling" value="Target" placeholder="" required />
                        <x-form.textarea title="Hasil" name="hasilkonseling" value="Hasil" placeholder="" required />
                        <x-form.textarea title="Summary" name="summary" value="Summary" placeholder="" required />
                        <x-button.button-save title="Save" icon="save" class="btn btn-primary" />
                        <x-button.button-link class="btn btn-dark text-white" title="Go Back" icon="arrow-left"
                            url="{{ route('admin.counseling.index') }}">
                        </x-button.button-link>
                    </form>
                </x-card.card>
            </div>
        </div>
    </div>
@endsection
