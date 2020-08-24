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

                Notulen {{ Auth::user()->name }}

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
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a href="{{ route('rapat.create') }}" class="btn btn-info text-white">
                                    <i class="lnr lnr-printer">  </i>Tambah Notulen
                                </a>
                                <hr>
                                <div class="data-table-list">
                                    <div class="table-responsive">
                                        <table id="data-table-basic" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>KEGIATAN</th>
                                                    <th>KETUA</th>
                                                    <th>WAKTU</th>
                                                    <th>LOKASI</th>
                                                    <th>KET</th>
                                                    <th>UPDATE</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($list) > 0)
                                                @foreach($list['show'] as $item)
                                                <tr>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->kepala }}</td>
                                                    <td>{{ $item->tanggal }}</td>
                                                    <td>{{ $item->lokasi }}</td>
                                                    <td>{{ $item->keterangan }}</td>
                                                    <td>{{ $item->created_at->diffForHumans() }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#lihatFile{{ $item->id }}">Lihat</button>
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusFile{{ $item->id }}">Hapus</button>
                                                        {{-- <form action="{{ route('rapat.destroy', $item->id) }}" method="POST">
                                                            <a class="btn btn-warning btn-sm" onclick="window.location.href='{{ route('rapat.edit', $item->id) }}'">
                                                                <i class="lnr lnr-pencil"></i>Edit
                                                            </a>
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-danger btn-sm"><i class="lnr lnr-trash"></i>Hapus</button>
                                                        </form> --}}
                                                        
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan=7>Tidak Ada Data</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>KEGIATAN</th>
                                                    <th>KETUA</th>
                                                    <th>WAKTU</th>
                                                    <th>LOKASI</th>
                                                    <th>KET</th>
                                                    <th>UPDATE</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @else
                    <p>
                        Anda tidak memiliki akses untuk Halaman ini.
                    </p>
                @endrole
            </div>
        </div>
    </div>
</div>

@foreach($list['show'] as $item)
<div class="modal fade bd-example-modal-lg" id="hapusFile{{ $item->id }}" role="dialog" aria-labelledby="confirmFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">
            Yakin ingin Menghapus?
          </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <p>
                @if(count($list) > 0)
                {{ $item->nama }}'s Files. <br>
                Undangan  : {{ $item->title1 }} ({{Storage::size($item->filename1)}} bytes) <br>
                Materi    : {{ $item->title2 }} ({{Storage::size($item->filename2)}} bytes) <br>
                Absensi   : {{ $item->title3 }} ({{Storage::size($item->filename3)}} bytes) <br>
                Notulen   : {{ $item->title4 }} ({{Storage::size($item->filename4)}} bytes)
                @endif
            </p>
        </div>
        <div class="modal-footer">
            @if(count($list) > 0)
                <form action="{{ route('pilar.destroy', $item->id) }}" method="POST">
                    {{-- <a class="btn btn-warning btn-sm" onclick="window.location.href='{{ route('imutpilar.edit', $item->id) }}'">
                        <i class="lnr lnr-pencil"></i>Edit
                    </a> --}}
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-sm"><i class="lnr lnr-trash"></i>Hapus</button>
                </form>
            @endif
        </div>
      </div>
    </div>
</div>
@endforeach

@foreach($list['show'] as $item)
    <div class="modal fade bd-example-modal-lg" id="lihatFile{{ $item->id }}" role="dialog" aria-labelledby="confirmFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">
                {{ $item->nama }}'s Files
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <p>
                Download File: <p></p>
                <a onclick="window.location.href='{{ url('rapat/show/'. $item->id) }}'" class="btn btn-success btn-sm text-white"><i class="fa fa-download"></i></a>   {{ $item->title1 }} ({{Storage::size($item->filename1)}} bytes)<p></p>
                <a onclick="window.location.href='{{ url('rapat/show2/'. $item->id) }}'" class="btn btn-success btn-sm text-white"><i class="fa fa-download"></i></a>   {{ $item->title2 }} ({{Storage::size($item->filename2)}} bytes)<p></p>
                <a onclick="window.location.href='{{ url('rapat/show3/'. $item->id) }}'" class="btn btn-success btn-sm text-white"><i class="fa fa-download"></i></a>   {{ $item->title3 }} ({{Storage::size($item->filename3)}} bytes)<p></p>
                <a onclick="window.location.href='{{ url('rapat/show4/'. $item->id) }}'" class="btn btn-success btn-sm text-white"><i class="fa fa-download"></i></a>   {{ $item->title4 }} ({{Storage::size($item->filename4)}} bytes)<p></p>
            </p>
            </div>
            <div class="modal-footer">
                <p class="pull-left"><td>{{ $item->updated_at->diffForHumans() }}</td></p>
            </div>
        </div>
        </div>
    </div>
@endforeach

@endsection

@section('footer_scripts')
@endsection
