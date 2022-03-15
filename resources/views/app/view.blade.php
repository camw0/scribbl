@extends('layouts.app')

@section('content')
<h2 class="white fs-l2 md-fs-xl1 fw-900 lh-2">
    <i data-feather="file-text" width="64" height="64"></i>
    <span class="border-b bc-indigo bw-4">{{ $scribbl->title }}</span>
    <a href="#" class="no-underline">
        <span class="fs-s1 mx-3 py-3 red"
            onclick="event.preventDefault();document.getElementById('delete-form').submit();">
            Delete
        </span>
    </a>
    <a href="{{ route('app.edit', $scribbl->id) }}" class="no-underline">
        <span class="fs-s1 mx-3 py-3 yellow">
            Edit
        </span>
    </a>
    <a href="{{ route('app.info', $scribbl->id) }}" class="no-underline">
        <span class="fs-s1 mx-3 py-3 green">
            Info
        </span>
    </a>
</h2>
<div class="br-8 bg-indigo-lightest-10 p-5 md-p-l5 flex flex-wrap md-justify-between md-items-center">
    <h2 class="white">
        {{ $scribbl->description }}
    </h2>
</div>
<p class="fs-s1 mx-3 py-3 indigo no-underline">
    Last updated {{ $scribbl->updated_at->diffForHumans() }} by
    {{ \App\Models\User::find($scribbl->owner)->name }}
</p>
<form id="delete-form" action="{{ route('app.delete', $scribbl->id) }}" method="POST" class="d-none">
    @csrf
</form>
@endsection