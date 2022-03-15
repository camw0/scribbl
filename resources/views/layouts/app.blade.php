<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('app.name', 'Scribbl') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/shorthandcss@1.1.1/dist/shorthand.min.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Muli:200,300,400,500,600,700,800,900&display=swap" />
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body class="bg-black muli">
    <div id="app">
        <nav class="w-100pc flex flex-column md-flex-row md-px-10 py-5 bg-black">
            <div class="flex justify-between">
                <a href="/" class="flex items-center p-2 mr-4 no-underline">
                    {{ config('app.name') }}
                </a>
            </div>
            <div id="nav-items"
                class="hidden flex sm-w-100pc flex-column md-flex md-flex-row md-justify-end items-center">
                @guest @if (Route::has('login'))
                <a href="/login" class="fs-s1 mx-3 py-3 indigo no-underline hover-underline">Login</a>
                @endif @if (Route::has('register'))
                <a href="/register" class="fs-s1 mx-3 py-3 indigo no-underline hover-underline">Register</a>
                @endif
                @else
                <a href="/dashboard" class="fs-s1 mx-3 py-3 indigo no-underline hover-underline">Your Scribbls</a>
                <a href="/dashboard/account" class="fs-s1 mx-3 py-3 indigo no-underline hover-underline">Account</a>
                <a href="{{ route('logout') }}" class="fs-s1 mx-3 py-3 indigo no-underline hover-underline"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    Sign out
                </a>
                <a href="/dashboard/create" class="button bg-white black fw-600 no-underline mx-5">Create</a>
                @endguest
            </div>
        </nav>
        <main>
            <section class="p-10 md-p-l5">
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
                @yield('content')
            </section>
        </main>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <script>
        feather.replace();
    </script>
</body>

</html>