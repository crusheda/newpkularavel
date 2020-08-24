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

                Pengadaan Barang Non Rutin 

                @role('it', true)
                    <span class="pull-right badge badge-primary" style="margin-top:4px">
                        Akses IT Support
                    </span>
                @else
                    <span class="pull-right badge badge-warning" style="margin-top:4px">
                        Akses Publik
                    </span>
                @endrole

            </div>
            <div class="card-body">
                @role('it', true)
                <a type="button" class="btn btn-info text-white" href="{{ route('nonrutin.create') }}">Tambah Pengadaan</a>
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
                                        <a type="button" class="btn btn-success btn-sm disabled" href="{{ route('nonrutin.cetak', $item->token) }}">Cetak</a>
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
                @else
                <div class="col text-center">
                    <a type="button" class="btn btn-info text-white text-center" href="{{ route('nonrutin.create') }}" align:center>Tambah Pengadaan</a>
                </div>
                @endrole
            </div>
        </div>
    </div>
</div>

@foreach($list['getby'] as $item)
<div class="modal fade bd-example-modal-lg" id="hapusData{{ $item->token }}" role="dialog" aria-labelledby="confirmFormLabel" aria-hidden="true">
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
                @if(count($list['getby']) > 0)
                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                                <th>UNIT</th>
                                <th>PEMOHON</th>
                                <th>TANGGAL</th>
                            </thead>
                            <tbody>
                                <td>{{ $item->unit }}</td>
                                <td>{{ $item->pemohon }}</td>
                                <td>{{ $item->created_at }}</td>
                            </tbody>
                        </table>
                    </div>
                @endif
            </p>
        </div>
        <div class="modal-footer">
            @if(count($list) > 0)
                <form action="{{ route('rutin.destroy', $item->token) }}" method="POST">
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

@foreach($list['getby'] as $item)
<div class="modal fade bd-example-modal-lg" id="lihatData{{ $item->token }}" role="dialog" aria-labelledby="confirmFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">
            {{-- Detail Pengadaan {{ $item->jnspengadaan }} Unit {{ $item->unit }} --}}
          </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <p>
                <div class="table-responsive">
                    <table id="data-table-basic" class="table table-striped">
                            <thead>
                                <th>UNIT</th>
                                <th>PEMOHON</th>
                                <th>BARANG</th>
                                <th>JUMLAH</th>
                                <th>SATUAN</th>
                                <th>HARGA</th>
                                <th>TOTAL</th>
                                <th>KETERANGAN</th>
                                <th>TANGGAL</th>
                            </thead>
                            <tbody>
                                @if(count($list['getby']) > 0)
                                    @foreach($item as $item)
                                        {{-- <td>{{ $item->unit }}</td>
                                        <td>{{ $item->pemohon }}</td>
                                        <td>{{ $item->barang }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->satuan }}</td>
                                        <td>{{ $item->harga }}</td>
                                        <td>{{ $item->total }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>{{ $item->created_at }}</td> --}}
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
            </p>
        </div>
        <div class="modal-footer">
            @if(count($list['getby']) > 0)
            {{-- <h5 class="pull-right">{{ $item->created_at->diffForHumans() }}</h5> --}}
            @endif
        </div>
      </div>
    </div>
</div>
@endforeach

@endsection

@section('footer_scripts')
@endsection