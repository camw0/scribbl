<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ config('app.name') }} &bull; Dashboard</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/shorthandcss@1.1.1/dist/shorthand.min.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:200,300,400,500,600,700,800,900&display=swap" />
    </head>
    <body class="bg-black muli">
        <section class="p-10 md-p-l5">
            <h2 class="white fs-l2 md-fs-xl1 fw-900 lh-2">
                Welcome to <span class="border-b bc-indigo bw-4">Scribbl</span>
                <a 
                    href="{{ route('logout') }}"
                    onclick="
                        event.preventDefault();
                        document.getElementById('logout-form').submit();"
                >
                    <button class="button-md bg-indigo indigo-lightest bw-0 fw-300 fs-s3">Sign out</button>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </h2>
            <div class="br-8 bg-indigo-lightest-10 p-5 md-p-l5 flex flex-wrap md-justify-between md-items-center">
                <div class="w-100pc md-w-100pc">
                    <p class="fw-600 indigo-lightest opacity-30">
                        Hey! If you&apos;re seeing this, you&apos;re seeing the first ever version of Scribbl.
                        <br/>
                        Thanks for being a super super early adopter (or curious person from the future!).
                    </p>
                </div>
            </div>
        </section>
    </body>
</html>
