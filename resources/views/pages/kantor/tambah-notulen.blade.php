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

                Tambah Notulen Baru

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
                    <form class="form-auth-small" action="{{ route('rapat.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label>Kegiatan :</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="">
                        <br>
                        <label>Ketua Rapat :</label>
                        <input type="text" name="kepala" id="kepala" class="form-control" placeholder="">
                        <br>
                        <label>Tanggal :</label>
                        <input type="datetime-local" name="tanggal" id="tanggal" class="form-control" placeholder="">
                        <br>
                        <label>Lokasi Rapat :</label>
                        <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="">
                        <br>
                        <label>Keterangan :</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" placeholder=""></textarea>
                        <br>
                            <label>File</label>
                            <input type="file" name="file">
                            <span class="help-block text-danger">{{ $errors->first('file') }}</span>
                        <br>
                        <button class="btn btn-primary text-white pull-right" id="submit">Submit</button>
                    </form>
                @endrole
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer_scripts')
@endsection
