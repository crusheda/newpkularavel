@extends('layouts.app')

@section('template_title')
    {{ Auth::user()->name }}'s Homepage
@endsection

@section('template_fastload_css')
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="card" style="width: 100%">
            <div class="card-header @role('kantor', true) bg-secondary text-white @endrole">

                Edit Notulen : {{ $list->nama }}

                @role('kantor', true)
                    <span class="pull-right badge badge-primary" style="margin-top:4px">
                        Akses Kantor
                    </span>
                @else
                    <span class="pull-right badge badge-warning" style="margin-top:4px">
                        Akses Tidak Diketahui
                    </span>
                @endrole

            </div>
            <div class="card-body">
                @role('kantor', true)
                    {{-- <form class="form-auth-small" action="{{ route('rapat.store') }}" method="POST" enctype="multipart/form-data"> --}}
                        {{ Form::model($list, array('route' => array('rapat.update', $list->id), 'method' => 'PUT')) }}
                        @csrf
                        <label for="nama">Kegiatan :</label>
                        <input type="text" name="nama" id="nama" value="{{ $list->nama }}" class="form-control" placeholder="">
                        <br>
                        <label for="kepala">Ketua Rapat :</label>
                        <input type="text" name="kepala" id="kepala" value="{{ $list->kepala }}" class="form-control" placeholder="">
                        <br>
                        <label for="tanggal">Tanggal :</label>
                        <input type="datetime-local" name="tanggal" id="tanggal" value="<?php echo strftime('%Y-%m-%dT%H:%M:%S', strtotime($list->tanggal)); ?>" class="form-control" placeholder="">
                        <br>
                        <label for="lokasi">Lokasi Rapat :</label>
                        <input type="text" name="lokasi" id="lokasi" value="{{ $list->lokasi }}" class="form-control" placeholder="">
                        <br>
                        <label for="keterangan">Keterangan :</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" placeholder="">{{ $list->keterangan }}</textarea>
                        <br>
                            <label>Unggah File: </label>
                            <input type="file" name="file" value="{{ $list->title }}">
                            <span class="help-block text-danger">{{ $errors->first('file') }}</span>
                            <br>
                            <label>File Lama : {{ Storage::url($list->title) }}</label>
                        <br>
                        <button class="btn btn-primary text-white pull-right" id="submit">Submit</button>
                        {{ Form::close() }}
                    {{-- </form> --}}
                @endrole
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer_scripts')
@endsection
