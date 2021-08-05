<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tables</title>
    <!-- CSS -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div style="margin-top:20px;">
            @include("errors")
        </div>
        <div class="row">
            <div class="col-md-2">
                @include("menu_list")
            </div>
            <div class="col-md-9">
                <div class="container">
                    @yield('content-main')
                </div>
            </div>
        </div>

    <!-- JS -->
        <script src="{{ asset('/js/app.js') }}"></script>
        <script src="{{ asset('/js/script.js') }}"></script>
    </div>
</body>
</html>