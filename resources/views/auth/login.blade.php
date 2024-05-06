<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Infrastructure Monitoring System | Log In</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>


<style>
</style>

<body class="gray-bg" style='background-color: #1E73BE !important'>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="text-center loginscreen animated fadeInDown card" style='margin-top:40px; padding-bottom:50px;'>
                    <div>
                        <div>
                            <div class="logo-name" style='font-size:120px '><img alt="image" style="width:65%;" src="img/logo.png"></div>
                        </div>
                        <h2 style="padding-bottom:20px; color: #1E73BE"><strong>Infrastructure Management System</strong></h2>
                        <form method="POST" action="{{ route('login') }}" style="margin-left: 30px; margin-right: 30px;">
                            @csrf
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end" style="font-size:14px">{{ __('Email Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end" style="font-size:14px">{{ __('Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-2"></div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success" style='background-color: #1E73BE !important; border-color: #1E73BE !important'>
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <p class="m-t"> <small></small> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</html>