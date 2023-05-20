<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Champion's Academy" />
    <meta name="image" content="{{ asset('web-assets/ico/favicon.png') }}" />

    <!-- fontawesome  -->
    <link rel="stylesheet" href="{{ asset('web-assets/loginandout/all.min.css') }}">
    <!-- fonts google -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap"
        rel="stylesheet">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('web-assets/loginandout/bootstrap.min.css') }}">
    <!-- normalize -->
    <link rel="stylesheet" href="{{ asset('web-assets/loginandout/normalize.css') }}">
    <!-- stylesheet  -->

    <link rel="stylesheet" href="{{ asset('web-assets/loginandout/sign-in.css') }}">
    <!-- icon -->
    <link rel="icon" href="{{ asset('web-assets/ico/favicon.png') }}">
    <title> Sign up </title>
</head>

<body>

    <div class="row mx-0">
        <div class="col-sm-12 col-md-6">
            <div class="slider_section slider_details ">
                <h1> the best way <br> to plan your future you need us</h1>
                <p>there are endless posibilities when planning your next <br> step so we are waiting for you to join
                    champion's</p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class=" slider_details side_right_details">
                <div class="mb-5">
                    <img style="width:150px !important;height:150px !important"
                        src="{{ asset('img/logo.jpg') }}" alt="" srcset="">
                    <h5 class="text-center">Sign up Now</h5>
                    <a href="{{ route('web-login') }}"> {{ __('Have An Acount ?') }} </a>

                </div>
                @if(count($errors) > 0 )
                <div class="alert alert-danger alert-dismissible fade show" role="alert">

                  <ul class="p-0 m-0" style="list-style: none;">
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
                @if (\Session::has('msg'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">

                  <ul class="p-0 m-0" style="list-style: none;">
                    <li>{!! \Session::get('msg') !!}</li>

                  </ul>
                </div>
                @endif
                <form method="POST" class="bg-white rounded shadow-5-strong p-5" action="{{ route('save-register') }}">
                    @csrf
  <!-- Email input -->
  <div class="row mb-3">
    <label for="form1Example3" class="col-md-3 col-form-label text-md-start">User Name</label>
    <div class="col-md-8">
  <input type="text" name="name" value="{{ old('name') }}" id="form1Example3" class="form-control" />
</div></div>
                <!-- Email input -->
                <div class="row mb-3">
                    <label for="form1Example1" class="col-md-3 col-form-label text-md-start">Email Address</label>
                    <div class="col-md-8">
                  <input type="email" value="{{ old('email') }}" name="email" id="form1Example1" class="form-control" />
                </div>
                </div>
                <!-- Password input -->
                <div class="row mb-3">
                    <label for="form1Example2" class="col-md-3 col-form-label text-md-start">Password</label>
                    <div class="col-md-8">
                  <input type="password" name="password" id="form1Example2" class="form-control" />
                </div>
                </div>
                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-3 col-form-label text-md-start">{{ __('Confirm Password') }}</label>

                    <div class="col-md-8">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                  <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    {{-- <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                      <label class="form-check-label" for="form1Example3">
                        Remember me
                      </label>
                    </div> --}}
                  </div>

                  {{-- <div class="col text-center">
                    <!-- Simple link -->
                    <a href="#!">Forgot password?</a>
                  </div> --}}
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
              </form>
            </div>
        </div>
    </div>


  <!--Footer-->
  <!-- javascripts links -->
    <!-- bootstrap 5.0v scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="{{ asset('web-assets/loginandout/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
