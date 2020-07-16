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
            <div class="card-header @role('it', true) bg-secondary text-white @endrole">

                Welcome {{ Auth::user()->name }}

                @role('it', true)
                    <span class="pull-right badge badge-primary" style="margin-top:4px">
                        Akses IT
                    </span>
                @else
                    <span class="pull-right badge badge-warning" style="margin-top:4px">
                        Akses Tidak Diketahui
                    </span>
                @endrole

            </div>
            <div class="card-body">
                @role('it', true)
                    <p>
                        <p>
                            ini page IT    
                        </p>
                    </p>
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
