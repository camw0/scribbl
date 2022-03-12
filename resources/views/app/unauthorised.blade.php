@extends('layouts.app')

@section('content')
    <section class="p-10 md-p-l5">
        <h2 class="white fs-l2 md-fs-xl1 fw-900 lh-2">
            <i data-feather="x-circle" width="64" height="64" color="red"></i>
            <span class="border-b bc-indigo bw-4">Unauthorised</span>
        </h2>
        <div class="br-8 bg-indigo-lightest-10 p-5 md-p-l5 flex flex-wrap md-justify-between md-items-center">
            <h2 class="white">
                You are not authorised to access this Scribbl.
            </h2>
        </div>
    </section>
@endsection
