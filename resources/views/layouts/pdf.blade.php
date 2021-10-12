<html>
<head>
    <title>Резюме {{ $resume->FIO }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style>
        @font-face {
            font-family: 'Arial';
            font-style: normal;
            font-weight: normal;
            src: url({!! url('/fonts/arial.ttf')  !!}) format('truetype');
        }

        html {
            font-family: Arial, Tahoma, "Times New Roman", DejaVu Sans, sans-serif;
        }

        h1 {
            margin-bottom: 8px;
        }

        .section {
            margin-top: 50px;
        }

        div.section p {
            margin-top: 4px;
        }

    </style>
</head>
<body>
@yield('content')

</body>

</html>
