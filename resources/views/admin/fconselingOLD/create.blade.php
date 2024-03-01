@extends('layouts.backend.master')

@section('title', 'Form Counseling')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <x-card.card title="Form Identifikasi Coaching">
                    <form action="{{ route('admin.fconseling.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-form.input type="text" title="Nama Coachee" name="name" value=""
                            placeholder="Input Nama Coachee" />
                        <!-- <x-form.input type="file" title="fconseling cover" name="cover" value="" placeholder="" /> -->
                        <x-form.input type="text" title="Jabatan" name="name" value=""
                            placeholder="Input Jabatan" />
                        <x-form.input type="text" title="Nama Coach" name="name" value=""
                            placeholder="Input Nama Coach" />
                        <x-form.input type="text" title="Jabatan" name="name" value=""
                            placeholder="Input Jabatan" />
                        <x-form.input type="date" title="Tanggal Pelaksanaan" name="name" value=""
                            placeholder="Input fconseling Coachee" />
                        <!-- <div title="iGROW" style="background-color: #f0f0f0; padding: 10px; border-radius: 5px; text-align: center;">
                                <p style="margin: 0; padding: 5px; font-weight: bold;">iGrow</p>
                                <p style="margin: 0; padding: 5px;">Be Present - Fokuskan perhatian anda pada klien, hadir sepenuhnya untuk mendengarkan dan merespon.</p>
                                <p style="margin: 0; padding: 5px;">Be Patient - Sabar, kendalikan emosi, tidak terburu-buru berusaha mendapatkan solusi.</p>
                                <p style="margin: 0; padding: 5px;">Be Curious - Bangun rasa ingin tahu, menahan diri dari keinginan untuk menasehati atau memberikan saran.</p>
                        </div> -->
                        <x-form.textarea title="Topik Counseling" name="description" value=""
                            placeholder="Topik Counseling" />
                            <x-form.textarea title="Respon Counsele" name="description" value=""
                            placeholder="Respon Counsele" />
                            <x-form.textarea title="Follow Up" name="description" value=""
                            placeholder="Follow Up" />
                        <x-form.textarea title="Target" name="description" value=""
                            placeholder="Target" />
                        <x-form.textarea title="Hasil" name="description" value=""
                            placeholder="Hasil" />
                        <x-form.textarea title="Summary" name="description" value=""
                            placeholder="Summary" />
                        <x-form.textarea title="Nama Konselor" name="description" value=""
                            placeholder="Konselor" />
                        <x-button.button-save title="Save" icon="save" class="btn btn-primary" />
                        <x-button.button-link class="btn btn-dark text-white" title="Go Back" icon="arrow-left"
                            url="{{ route('admin.fconseling.index') }}">
                        </x-button.button-link>
                    </form>
                </x-card.card>
            </div>
        </div>
    </div>
@endsection