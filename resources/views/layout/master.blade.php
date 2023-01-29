@extends('layout.base')
@section('master')
@include('include.header')
@include('include.sidebar')
<section class="content">
    <div class="container-fluid">
        {{-- <div class="block-header">
            <h2>DASHBOARD</h2>
        </div> --}}
        @yield('contents')
    </div>
</section>

@include('include.scripts')

@endsection

