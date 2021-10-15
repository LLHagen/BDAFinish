<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#7952b3">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

    {{ !empty($head) ? $head : '' }}

    <title>{{ !empty($title) ? $title : env('APP_NAME') }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }
    </style>
</head>
<body>
    <main>
        <div class="album py-5">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-12">
                    <div class="col">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
