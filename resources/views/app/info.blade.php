@extends('layouts.app')

@section('content')
    <section class="p-10 md-p-l5">
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
            <a href="{{ route('app.view', $scribbl->id) }}" class="no-underline">
                <span class="fs-s1 mx-3 py-3 green">
                    Return
                </span>
            </a>
        </h2>
        <div class="br-8 bg-indigo-lightest-10 p-5 md-p-l5 flex flex-wrap md-justify-between md-items-center">
            <div class="w-100pc md-w-50pc p-3">
                <div class="block p-5 bg-indigo-lightest-10">
                    <p class="fw-600 white fs-l2">
                        <span class="border-b bc-indigo bw-4">Scribbl</span> Information
                    </p>
                    <h2 class="white mt-8 mb-4">
                        <i data-feather="file-text" width="16" height="16"></i>
                        Scribbl ID <span class="indigo">{{ $scribbl->id }}</span>
                    </h2>
                    <h2 class="white mt-4 mb-4">
                        <i data-feather="clock" width="16" height="16"></i>
                        Created  <span class="indigo">{{ $scribbl->created_at->diffForHumans() }}</span>
                    </h2>
                    <h2 class="white mt-4 mb-8">
                        <i data-feather="clock" width="16" height="16"></i>
                        Updated <span class="indigo">{{ $scribbl->updated_at->diffForHumans() }}</span>
                    </h2>
                </div>
            </div>
            <div class="w-100pc md-w-50pc p-3">
                <div class="block p-5 bg-indigo-lightest-10">
                    <p class="fw-600 white fs-l2">
                        <span class="border-b bc-indigo bw-4">User</span> Information
                    </p>
                    <h2 class="white mt-8 mb-4">
                        <i data-feather="edit-3" width="16" height="16"></i>
                        Made by <span class="indigo">{{ $user->name }}</span>
                    </h2>
                    <h2 class="white mt-4 mb-4">
                        <i data-feather="at-sign" width="16" height="16"></i>
                        Email <span class="indigo">{{ $user->email }}</span>
                    </h2>
                    <h2 class="white mt-4 mb-8">
                        <i data-feather="clock" width="16" height="16"></i>
                        User since <span class="indigo">{{ $user->created_at }}</span>
                    </h2>
                </div>
            </div>
        </div>
    </section>
    <form id="delete-form" action="{{ route('app.delete', $scribbl->id) }}" method="POST" class="d-none">
        @csrf
    </form>
@endsection
