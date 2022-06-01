<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Forgot Password</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/page-auth.css') }}" />
</head>

<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <span class="app-brand-logo demo">

                            </span>
                            <span class="app-brand-text demo text-body fw-bolder">WELCOME</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">FORGOT PASSWORD</h4>

                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('message') }}
                            </div>
                        @endif

                        <form id="formAuthentication" class="mb-3"
                            action="{{ route('forget.password.post') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email"
                                    placeholder="Type your email address"  />
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary d-grid w-100" type="submit">Email password reset link</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
