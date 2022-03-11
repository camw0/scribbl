@extends('layouts.app')

@section('content')
    <section class="p-10 md-p-l5">
        <h2 class="white fs-l2 md-fs-xl1 fw-900 lh-2">
            <span class="border-b bc-indigo bw-4">{{ $scribbl->title }}</span>
            <span class="fs-s1 mx-3 py-3 red"
                onclick="event.preventDefault();document.getElementById('delete-form').submit();">
                Delete
            </span>
            <span class="fs-s1 mx-3 py-3 yellow">
                Edit
            </span>
            <span class="fs-s1 mx-3 py-3 green">
                Copy
            </span>
        </h2>
        <div class="br-8 bg-indigo-lightest-10 p-5 md-p-l5 flex flex-wrap md-justify-between md-items-center">
            <h2 class="white">
                {{ $scribbl->description }}
            </h2>
        </div>
        <p class="fs-s1 mx-3 py-3 indigo no-underline">Last updated {{ $scribbl->updated_at->diffForHumans() }} by {{ Auth::user()->name }}</p>
    </section>
    <form id="delete-form" action="/dashboard/delete/{{ $scribbl->id }}" method="POST" class="d-none">
        @csrf
    </form>
@endsection