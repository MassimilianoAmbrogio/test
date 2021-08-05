<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Area Login</title>
    <!-- CSS -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div style="margin-top:20px;">
        @include("errors")
    </div>

    <div class="container login-container">
        <form class="form-login" action="{{ route('login') }}" method="POST">
        {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6 login-form">
                    <h3>Login</h3>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="" required/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" required/>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" />
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-white" data-toggle="modal" data-target="#recoveryPasswordModal">Forgot Password</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @include("modals.verify")

    <!-- JS -->
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/script.js') }}"></script>
</body>
</html>