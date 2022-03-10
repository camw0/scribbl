@extends('layouts.app')

@section('content')
    <section class="p-10 md-p-l5">
        <h2 class="white fs-l2 md-fs-xl1 fw-900 lh-2">
            Your Scribbl <span class="border-b bc-indigo bw-4">Account</span>
        </h2>
        <div class="br-8 bg-indigo-lightest-10 p-5 md-p-l5 flex flex-wrap md-justify-between md-items-center">
            <div class="w-100pc md-w-100pc">
                <section class="p-0 md-p-5">
                    <div class="flex flex-wrap">
                        <div class="w-100pc md-w-33pc p-3">
                            <div class="block p-5 bg-indigo-lightest-10">
                                <p class="fw-600 white fs-l2 mt-3">
                                    {{ Auth::user()->name }}
                                </p>
                                <div class="indigo fs-m2 my-4">Username</div>
                            </div>
                        </div>
                        <div class="w-100pc md-w-33pc p-3">
                            <div class="block p-5 bg-indigo-lightest-10">
                                <p class="fw-600 white fs-l2 mt-3">
                                    {{ Auth::user()->total_scribbls }}
                                </p>
                                <div class="indigo fs-m2 my-4">Total Scribbls</div>
                            </div>
                        </div>
                        <div class="w-100pc md-w-33pc p-3">
                            <div class="block p-5 bg-indigo-lightest-10">
                                <p class="fw-600 white fs-l2 mt-3">
                                    {{ Auth::user()->created_at->diffForHumans() }}
                                </p>
                                <div class="indigo fs-m2 my-4">Time Created</div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection
