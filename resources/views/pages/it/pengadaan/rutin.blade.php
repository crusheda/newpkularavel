@extends('layouts.app')

@section('template_title')
    Pengadaan Rutin
@endsection

@section('template_fastload_css')
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="card" style="width: 100%">
            <div class="card-header @role('it', true) bg-secondary text-white @endrole">

                Pengadaan Barang Rutin 

                @role('it', true)
                    <span class="pull-right badge badge-primary" style="margin-top:4px">
                        Akses IT Support
                    </span>
                @else
                    <span class="pull-right badge badge-warning" style="margin-top:4px">
                        Akses Tidak Diketahui
                    </span>
                @endrole

            </div>
            <div class="card-body">
                @role('it', true)
                <a type="button" class="btn btn-info text-white" href="{{ route('rutin.create') }}">Tambah Pengadaan</a>
                <hr>
                <div class="data-table-list">
                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>UNIT</th>
                                    <th>PEMOHON</th>
                                    <th>TANGGAL</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($list['getby']) > 0)
                                @foreach($list['getby'] as $item)
                                <tr>
                                    <td>{{ $item->token }}</td>
                                    <td>{{ $item->unit }}</td>
                                    <td>{{ $item->pemohon }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#lihatData{{ $item->token }}">Lihat</button>
                                        <a type="button" class="btn btn-success btn-sm disabled" href="{{ route('rutin.cetak', $item->token) }}">Cetak</a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusData{{ $item->token }}">Hapus</button>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan=5>Tidak Ada Data</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                @endrole
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer_scripts')
@endsection
