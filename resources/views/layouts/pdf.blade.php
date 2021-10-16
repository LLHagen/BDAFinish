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
            line-height: 0.5;
        }
        h1 {
            margin-bottom: 8px;
            font-size: 20px;
        }
        .section {
            margin-top: 30px;
        }
        .mailto {
            font-size: 12px;
        }
        div.section p {
            margin-top: 4px;
            font-size: 12px;
        }
    </style>
</head>
<body>
@yield('content')

</body>

</html>
