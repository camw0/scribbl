<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/shorthandcss@1.1.1/dist/shorthand.min.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Muli:200,300,400,500,600,700,800,900&display=swap" />
</head>

<body class="bg-black muli">
    <section id="home" class="min-h-100vh flex justify-start items-center">
        <div class="mx-5 md-mx-l5">
            <div>
                <div class="w-100pc mx-auto py-10">
                    <h2 class="white fs-l2 md-fs-xl1 fw-900 lh-2">
                        Scribbl is a minimalistic, secure and <span class="border-b bc-indigo bw-4">fast</span>
                        place to store your notes. </h2>
                </div>
                <div class="br-8 mt-5 inline-flex">
                    <h6 class="white fs-l3">
                        <a href="/login" class="white no-underline">
                            <span class="border-b bc-indigo bw-4">Login</span>
                        </a>
                    </h6>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
