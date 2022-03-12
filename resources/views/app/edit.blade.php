@extends('layouts.app')

@section('content')
    <section class="p-10 md-p-l5">
        <h2 class="white fs-l2 md-fs-xl1 fw-900 lh-2">
            <i data-feather="edit" width="64" height="64"></i>
            Edit <span class="border-b bc-indigo bw-4">{{ $scribbl->title }}</span>
        </h2>
        <div class="br-8 bg-indigo-lightest-10 p-5 md-p-l5 flex flex-wrap md-justify-between md-items-center">
            <form method="POST" action="{{ route('app.edit', $scribbl->id) }}" class="w-100pc md-w-100pc">
                @csrf
                <br />
                <input id="title" name="title" type="text" required
                    class="input-lg w-100pc bw-0 fw-200 bg-indigo-lightest-10 white ph-indigo-lightest focus-white opacity-80 fs-m4 py-5"
                    value="{{ $scribbl->title }}">
                <hr class="bc-indigo" />
                <br />
                <textarea rows="5" id="description" name="description"
                    class="input-lg min-h-50vh w-100pc bw-0 fw-200 bg-indigo-lightest-10 white ph-indigo-lightest focus-white opacity-80 fs-m6"
                    >{{ $scribbl->description }}</textarea>
                <hr class="bc-indigo" />
                <br />
                <button type="submit" class="button-lg w-100pc bg-indigo indigo-lightest bw-0 fw-300 fs-s3">
                    Update
                </button>
            </form>
        </div>
    </section>
@endsection
