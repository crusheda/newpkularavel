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
                        <div class="row">
                            <div class="col-md-2">
                                <p>Undangan</p>
                                <p>Materi</p>
                                <p>Absensi</p>
                                <p>Notulen</p>
                            </div>
                            <div class="col-md-5">
                                <p>: {{ $list->title1 ." (". Storage::size($list->filename1) ." bytes)" }}</p>
                                <p>: {{ $list->title2 ." (". Storage::size($list->filename2) ." bytes)" }}</p>
                                <p>: {{ $list->title3 ." (". Storage::size($list->filename3) ." bytes)" }}</p>
                                <p>: {{ $list->title4 ." (". Storage::size($list->filename4) ." bytes)" }}</p>
                            </div>
                            <div class="col-md-5">

                            </div>
                        </div>
                        <button class="btn btn-primary text-white btn-block" id="submit">Submit</button>
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
