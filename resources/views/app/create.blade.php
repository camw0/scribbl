@extends('layouts.app')

@section('content')
    <section class="p-10 md-p-l5">
        <h2 class="white fs-l2 md-fs-xl1 fw-900 lh-2">
            Create a <span class="border-b bc-indigo bw-4">Scribbl</span>
        </h2>
        <div class="br-8 bg-indigo-lightest-10 p-5 md-p-l5 flex flex-wrap md-justify-between md-items-center">
            <form method="POST" action="{{ route('app.create.post') }}" class="w-100pc md-w-100pc">
                @csrf
                <h3 class="fw-600 white">
                    Give your Scribbl a title...
                </h3>
                <br/>
                <input 
                    id="title"
                    name="title"
                    type="text"
                    required
                    class="input-lg w-100pc bw-0 fw-200 bg-indigo-lightest-10 white ph-indigo-lightest focus-white opacity-80 fs-m4 py-5"
                    placeholder="'Shopping List', 'Plans for the future', 'How to dispose of a body'..."
                >
                <hr class="bc-indigo"/>
                <br/>
                <h3 class="fw-600 white mt-10">
                    Time to scribbl!
                </h3>
                <br/>
                <input 
                    id="description"
                    name="description"
                    type="text"
                    class="input-lg min-h-50vh w-100pc bw-0 fw-200 bg-indigo-lightest-10 white ph-indigo-lightest focus-white opacity-80 fs-m6"
                >
                <hr class="bc-indigo"/>
                <br/>
                <button 
                    type="submit"
                    class="button-lg w-100pc bg-indigo indigo-lightest bw-0 fw-300 fs-s3"
                >
                    Create
                </button>
            </form>
        </div>
    </section>
@endsection
