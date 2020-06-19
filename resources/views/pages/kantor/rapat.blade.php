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
                                <div class="data-table-list">
                                    <div class="table-responsive">
                                        <table id="data-table-basic" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>FILE</th>
                                                    <th>NAME</th>
                                                    <th>TGL</th>
                                                    <th>LEADER</th>
                                                    <th>LOCATION</th>
                                                    <th>NOTE</th>
                                                    <th>SUBJECT</th>
                                                    <th>TIME</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($list) > 0)
                                                @foreach($list['show'] as $item)
                                                <tr>
                                                    <td>
                                                        <a onclick="window.location.href='{{ route('rapat.show', $item->id) }}'" class="btn btn-info btn-sm">
                                                            <i class="lnr lnr-download"></i>
                                                        </a>
                                                    </td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>{{ $item->title }}</td>
                                                    <td>{{ $item->created_at->diffForHumans() }}</td>
                                                    <td>
                                                        <form action="{{ route('rapat.destroy', $item->id) }}" method="POST">
                                                            <a class="btn btn-warning btn-sm" onclick="window.location.href='{{ route('rapat.update', $item->id) }}'">
                                                                <i class="lnr lnr-pencil"></i>
                                                            </a>
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-danger btn-sm"><i class="lnr lnr-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan=8>Tidak Ada Data</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>FILE</th>
                                                    <th>NAME</th>
                                                    <th>TGL</th>
                                                    <th>LEADER</th>
                                                    <th>LOCATION</th>
                                                    <th>NOTE</th>
                                                    <th>SUBJECT</th>
                                                    <th>TIME</th>
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

@endsection

@section('footer_scripts')
@endsection
