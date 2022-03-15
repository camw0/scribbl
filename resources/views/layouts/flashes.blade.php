@extends('layouts.app')

@section('flashes')
    @if (session('error'))
        <p class="fw-600 red fs-m2 mt-10">
            <i data-feather="x-circle" width="16" height="16" color="red"></i>
            {!! session('error') !!}
        </p>
    @endif
    @if (session('warning'))
        <p class="fw-600 yellow fs-m2 mt-10">
            <i data-feather="alert-circle" width="16" height="16" color="yellow"></i>
            {!! session('warning') !!}
        </p>
    @endif
    @if (session('success'))
        <p class="fw-600 green fs-m2 mt-10">
            <i data-feather="check-circle" width="16" height="16" color="green"></i>
            {!! session('success') !!}
        </p>
    @endif
    @if (session('info'))
        <p class="fw-600 blue fs-m2 mt-10">
            <i data-feather="info" width="16" height="16" color="blue"></i>
            {!! session('info') !!}
        </p>
    @endif
@endsection