@extends('layouts.app')

@section('content')
    <section class="p-10 md-p-l5">
        <h2 class="white fs-l2 md-fs-xl1 fw-900 lh-2">
            Your Scribbl <span class="border-b bc-indigo bw-4">Account</span>
        </h2>
        <div class="br-8 bg-indigo-lightest-10 p-5 md-p-l5 flex flex-wrap md-justify-between md-items-center">
            <div class="w-100pc md-w-100pc">
                <p class="fw-600 indigo-lightest opacity-30">
                    Hey, {{ Auth::user()->name }}! 
                    <br/>
                    Total scribbls: {{ Auth::user()->total_scribbls }}
                    <br/>
                    ID: {{ Auth::user()->id }}
                    <br/>
                    Email: {{ Auth::user()->email }}
                    <br/>
                    Account created at {{ Auth::user()->created_at }}
                </p>
            </div>
        </div>
    </section>
@endsection
