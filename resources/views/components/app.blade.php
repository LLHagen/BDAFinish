<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="theme-color" content="#7952b3">

    <!-- Styles -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Scripts -->
    <script src="//kit.fontawesome.com/ae14988221.js" crossorigin="anonymous"></script>
    <!-- jQuery library -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="/css/datetimepicker.min.css">
    <script src="/js/datetimepicker.min.js"></script>

    {{ !empty($head) ? $head : '' }}


    <title>{{ !empty($title) ? $title : env('APP_NAME') }}</title>
    <style>
        body {
            font-family: "Arial", DejaVu Sans, sans-serif;
        }

        table th {
            text-wrap: none;
            word-break: keep-all;
            white-space: nowrap;
        }

        table thead th a, table thead th a:visited {
            color: white;
        }
    </style>
</head>
<body>
<main>
    <div class="container-fluid py-2">
        <div class="row">
            <div class="col">
                {{ $slot }}
            </div>
        </div>
    </div>
</main>

<script src="//cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>

</body>
</html>
