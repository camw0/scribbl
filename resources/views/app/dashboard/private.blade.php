@extends('layouts.app')

@section('content')
    <section class="p-10 md-p-l5">
        @if (session('error'))
            <p class="fw-600 red fs-m2 mt-10">
                <i data-feather="x-circle" width="16" height="16" color="red"></i>
                {!! session('error') !!}
            </p>
        @endif
        <h2 class="white fs-l2 md-fs-xl1 fw-900 lh-2">
            <i data-feather="home" width="64" height="64"></i>
            <span>
                Welcome to <span class="border-b bc-indigo bw-4">{{ config('app.name') }}</span>
                <a
                    href="{{ route('app.dashboard.public') }}"
                    class="button bg-white black fw-600 no-underline mx-5"
                >
                    Public Scribbls
                </a>
            </span>
        </h2>
        <div class="br-8 bg-indigo-lightest-10 p-5 md-p-l5 flex flex-wrap md-justify-between md-items-center">
            <div class="w-100pc md-w-100pc">
                <section class="p-0 md-p-5">
                    <h4 class="justify-center text-center white fs-l2 md-fs-x8 fw-900 lh-2 mb-10">
                        Private Scribbls
                    </h4>
                    <div class="flex flex-wrap">
                        @if (count($scribbls) < 1)
                            <p class="fw-600 white fs-m3 mt-3">
                                You don&apos;t seem to have any Scribbls.
                                Create one <a href="{{ route('app.create') }}">here!</a>
                            </p>
                            <br/>
                        @endif
                        @foreach ($scribbls as $s)
                            <div class="w-100pc md-w-33pc p-3">
                                <a href="{{ route('app.view', $s->id) }}"
                                    class="block no-underline p-5 br-8 bg-indigo-lightest-10 hover-scale-up-1 ease-300">
                                    <p class="fw-600 white fs-m3 mt-3 truncate overflow-x-hidden">
                                        {{ $s->title }}
                                    </p>
                                    <div class="indigo fs-s3 italic after-arrow-right my-4">
                                        {{ $s->created_at->diffForHumans() }}
                                        by
                                        {{ \App\Models\User::find($s->owner)->name }}
                                        @if (!$s->public)
                                            (Private)
                                        @else
                                            (Public)
                                        @endif
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection
