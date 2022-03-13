@extends('layouts.app')

@section('content')
    <section class="p-10 md-p-l5">
        <h2 class="white fs-l2 md-fs-xl1 fw-900 lh-2">
            <i data-feather="user-plus" width="64" height="64"></i>
            Sign up to <span class="border-b bc-indigo bw-4">Scribbl</span>
        </h2>
        <div class="br-8 bg-indigo-lightest-10 p-5 md-p-l5 flex flex-wrap md-justify-between md-items-center">
            <div class="w-100pc md-w-33pc">
                <p class="fw-600 indigo-lightest opacity-30">
                    Scribbl allows you to take notes quickly, easily and securely.
                    Signing up and using an account with Scribbl is entirely free, forever.
                    Here's what this means for you:
                </p>
                <p class="fw-600 indigo-lightest opacity-50 my-5">
                    <i data-feather="check-circle" width="16" height="16"></i> Unlimited notes
                    <br />
                    <i data-feather="check-circle" width="16" height="16"></i> 24/7 Unlimited access
                    <br />
                    <i data-feather="check-circle" width="16" height="16"></i> Full data transparency
                    <br />
                    <i data-feather="check-circle" width="16" height="16"></i> No advertisements
                    <br />
                    <i data-feather="check-circle" width="16" height="16"></i> No requirements
                </p>
                <div class="my-5">
                    <a href="/login">
                        <button class="button-md bg-indigo indigo-lightest bw-0 fw-300 fs-s3">Already have an
                            account?</button>
                    </a>
                </div>
            </div>
            <form method="POST" action="{{ route('register') }}" class="w-100pc md-w-50pc">
                @csrf
                @error('email')
                    <span class="@error('email') is-invalid @enderror white" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @error('name')
                    <span class="@error('name') is-invalid @enderror white" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @error('password')
                    <span class="@error('password') is-invalid @enderror white" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="flex my-5">
                    <input id="email" name="email" value="{{ old('email') }}" required autocomplete="email" type="email"
                        class="form-control input-lg flex-grow-1 bw-0 fw-200 bg-indigo-lightest-10 white ph-indigo-lightest focus-white opacity-80 fs-s3 py-5"
                        placeholder="Email Address">
                </div>
                <div class="flex my-5">
                    <input id="name" name="name" value="{{ old('name') }}" required autocomplete="name" type="text"
                        class="form-control input-lg flex-grow-1 bw-0 fw-200 bg-indigo-lightest-10 white ph-indigo-lightest focus-white opacity-80 fs-s3 py-5"
                        placeholder="Username">
                </div>
                <div class="flex my-5">
                    <input id="password" name="password" required autocomplete="new-password" type="password"
                        class="form-control input-lg flex-grow-1 bw-0 fw-200 bg-indigo-lightest-10 white ph-indigo-lightest focus-white opacity-80 fs-s3 py-5"
                        placeholder="Password">
                </div>
                <div class="flex my-5">
                    <button type="submit" class="button-lg bg-indigo indigo-lightest flex-grow-1 bw-0 fw-300 fs-s3">Get
                        Started</button>
                </div>
            </form>
        </div>
    </section>
@endsection
