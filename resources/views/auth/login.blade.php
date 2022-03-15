@extends('layouts.app')

@section('content')
<h2 class="white fs-l2 md-fs-xl1 fw-900 lh-2">
    <i data-feather="user-check" width="64" height="64"></i>
    Sign in to <span class="border-b bc-indigo bw-4">Scribbl</span>
</h2>
<div class="br-8 bg-indigo-lightest-10 p-5 md-p-l5 flex flex-wrap md-justify-between md-items-center">
    <div class="w-100pc md-w-33pc">
        <p class="fw-600 indigo-lightest opacity-30">
            Welcome back to Skribbl! Check out new features on our <a href="/">blog page</a>
            and enjoy the fastest, easiest, simplest note taking platform around.
        </p>
        <p class="fw-600 indigo-lightest opacity-30 my-5">
            Please <a href="mailto:hello@jex.cam">contact us</a> if you&apos;re facing issues with signing in.
            We don&apos;t bite!
        </p>
        <div class="my-5">
            <a href="/register">
                <button class="button-md bg-indigo indigo-lightest bw-0 fw-300 fs-s3">Need an account?</button>
            </a>
        </div>
    </div>
    <form method="POST" action="{{ route('login') }}" class="w-100pc md-w-50pc">
        @csrf
        @error('email')
            <span class="@error('email') is-invalid @enderror white" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        @error('password')
            <span class="@error('password') is-invalid @enderror white" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="flex my-5">
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address or Username"
                class="form-control input-lg flex-grow-1 bw-0 fw-200 bg-indigo-lightest-10 white ph-indigo-lightest focus-white opacity-80 fs-s3 py-5"
            />
        </div>
        <div class="flex my-5">
            <input id="password" name="password" required autocomplete="password" type="password"  placeholder="Password"
                class="form-control input-lg flex-grow-1 bw-0 fw-200 bg-indigo-lightest-10 white ph-indigo-lightest focus-white opacity-80 fs-s3 py-5"
            />
        </div>
        <div class="flex my-5">
            <button type="submit" class="button-lg bg-indigo indigo-lightest flex-grow-1 bw-0 fw-300 fs-s3">
                Sign In 
            </button>
        </div>
    </form>
</div>
@endsection