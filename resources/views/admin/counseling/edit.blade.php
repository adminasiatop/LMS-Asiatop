@extends('layouts.backend.master')

@section('title', 'Form Counseling')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <x-card.card title="Form Edit Counseling">
                    <form action="{{ route('admin.counseling.update',$Counseling->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
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
                            <x-form.textarea title="Topik conseling" name="topikkonseling" value="Topik Counseling" placeholder="">
                                {{$Counseling->topikkonseling}}
                            </x-form.textarea>
                            <x-form.textarea title="Respon Counsele" name="responsekonseling" value="Respon Counsele" placeholder="">
                                {{$Counseling->responsekonseling}}
                            </x-form.textarea>
                            <x-form.textarea title="Follow Up" name="fukonseling" value="Follow Up" placeholder="">
                                {{$Counseling->fukonseling}}
                            </x-form.textarea>
                            <x-form.textarea title="Target" name="targetkonseling" value="Target" placeholder="">
                                {{$Counseling->targetkonseling}}
                            </x-form.textarea>
                            <x-form.textarea title="Hasil" name="hasilkonseling" value="Hasil" placeholder="">
                                {{$Counseling->hasilkonseling}}
                            </x-form.textarea>
                            <x-form.textarea title="Summary" name="summary" value="Summary" placeholder="">
                                {{$Counseling->summary}}
                            </x-form.textarea>
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
