<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#7952b3">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src = "//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    {{ !empty($head) ? $head : '' }}

    <title>{{ !empty($title) ? $title : env('APP_NAME') }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }
        p{
            line-height: 1.3;
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
