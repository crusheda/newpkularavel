@extends('layouts.app')

@section('template_title')
    {{ Auth::user()->name }}'s Homepage
@endsection

@section('template_fastload_css')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
                @role('user')
                    @include('panels.welcome-panel')
                @endrole
                @role('farmasi')
                    @include('pages.farmasi.home')
                @endrole
                @role('kantor')
                    @include('pages.kantor.home')
                @endrole
                @role('it')
                    @include('pages.it.home')
                @endrole
            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
@endsection
