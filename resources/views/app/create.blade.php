@extends('layouts.app')

@section('content')
    <section class="p-10 md-p-l5">
        <h2 class="white fs-l2 md-fs-xl1 fw-900 lh-2">
            <i data-feather="plus-circle" width="64" height="64"></i>
            Create a <span class="border-b bc-indigo bw-4">Scribbl</span>
        </h2>
        <div class="br-8 bg-indigo-lightest-10 p-5 md-p-l5 flex flex-wrap md-justify-between md-items-center">
            <form method="POST" action="{{ route('app.create') }}" class="w-100pc md-w-100pc">
                @csrf
                <h3 class="fw-600 white">
                    Give your Scribbl a title...
                </h3>
                <br />
                <input id="title" name="title" type="text" required
                    class="input-lg w-100pc bw-0 fw-200 bg-indigo-lightest-10 white ph-indigo-lightest focus-white opacity-80 fs-m4 py-5"
                    placeholder="'Shopping List', 'Plans for the future', 'How to dispose of a body'...">
                <hr class="bc-indigo" />
                <br />
                <h3 class="fw-600 white mt-5">
                    Want to make your Scribbl public?
                    &nbsp;
                    <input
                        type="checkbox"
                        id="public"
                        name="public"
                    >
                    </input>
                </h3>
                <h5 class="fw-600 white">
                    Selecting this option will mean that the Scribbl will be publicly viewable
                    by anyone on the platform.
                </h5>
                <h3 class="fw-600 white mt-10">
                    Time to scribbl!
                </h3>
                <br />
                <textarea
                    rows="5"
                    id="description"
                    name="description"
                    class="input-lg min-h-50vh w-100pc bw-0 fw-200 bg-indigo-lightest-10 white ph-indigo-lightest focus-white opacity-80 fs-m6"
                ></textarea>
                <hr class="bc-indigo" />
                <br />
                <button type="submit" class="button-lg w-100pc bg-indigo indigo-lightest bw-0 fw-300 fs-s3">
                    Create
                </button>
            </form>
        </div>
    </section>
@endsection
