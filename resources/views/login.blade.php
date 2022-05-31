<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Login</title>
  <meta name="description" content="" />
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="{{asset('css/core.css')}}" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{asset('css/theme-default.css')}}" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{asset('css/demo.css')}}" />
  <link rel="stylesheet" href="{{asset('css/page-auth.css')}}" />
</head>

<body>
  <?php //Hiển thị thông báo thành công
  ?>
  @if ( Session::has('success') )
  <div class="alert alert-success alert-dismissible" role="alert">
    <strong>{{ Session::get('success') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      <span class="sr-only">Close</span>
    </button>
  </div>
  @endif
  <?php //Hiển thị thông báo lỗi
  ?>
  @if ( Session::has('error') )
  <div class="alert alert-danger alert-dismissible" role="alert">
    <strong>{{ Session::get('error') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      <span class="sr-only">Close</span>
    </button>
  </div>
  @endif
  @if ($errors->any())
  <div class="alert alert-danger alert-dismissible" role="alert">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      <span class="sr-only">Close</span>
    </button>
  </div>
  @endif
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
            <h4 class="mb-2">LOGIN 👋</h4>
            <p class="mb-4">Login here!</p>

            <form id="formAuthentication" class="mb-3" action="{{url('/login')}}" method="POST">
              {!! csrf_field() !!}
              <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="name" placeholder="Enter your email or username" autofocus />
                <span style="color: red;" class="error-message">{{ $errors->first('name') }}</span></p>
              </div>

              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
              <span style="color: red;" class="error-message">{{ $errors->first('password') }}</span></p>
          </div>
          <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
          </div>
          </form>
          <p class="text-center">
            <a href="{{url('/register')}}">
              <span>Create an account</span>
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>