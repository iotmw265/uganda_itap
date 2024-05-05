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

<!-- <body class="gray-bg" style='background-color: #1c5ebd !important'> -->
<body class="gray-bg" style='background-color: #e7313f !important'>

    <div class='row'>

            <div class='col-md-4'></div>
            <div class="col-md-4 text-center loginscreen animated fadeInDown card"  style='margin-top:120px; padding-bottom:50px;'>
                <div>
                    <div>
                        <div class="logo-name" style='font-size:130px '><img alt="image" style="width:75%;" src="img/nbs-bank.png"></div>
                    </div>
                    <h2 style="padding-bottom:20px; color: #e7313f"><strong>Infrastructure Management System</strong></h2>
                    <!-- <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                        Continually expanded and constantly improved Inspinia Admin Them (IN+)
                    </p>             -->
                    <form method="POST" action="{{ route('login') }}" style="margin-left: 70px;">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end" style="font-size:14px">{{ __('Email Address')
                                }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end" style="font-size:14px">{{ __('Password')
                                }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!--div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div-->

                        <div class="row mb-12">
                            <div class="col-md-2"></div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success"  style='background-color: #e7313f !important; border-color: #e7313f !important'>
                                    {{ __('Login') }}
                                </button>

                                <!--  @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif-->
                            </div>
                        </div>
                    </form>

                    <p class="m-t"> <small></small> </p>
                </div>
            </div>
            <div class='col-md-4'></div>


    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>

</body>

</html>