@extends('layouts.authentication')

@section('content')
    <div class="home-btn d-none d-sm-block">
        <a href="index.html"><i class="fas fa-home h2 text-dark"></i></a>
    </div>

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="text-center">
                        <a href="index.html">
                            <span><img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="22"></span>
                        </a>
                        <p class="text-muted mt-2 mb-4">Responsive Admin Dashboard</p>
                    </div>
                    <div class="card">

                        <div class="card-body p-4">
                            
                            <div class="text-center mb-4">
                                <h4 class="text-uppercase mt-0">Sign In</h4>
                            </div>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signin" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="checkbox-signin"> {{ __('Remember Me') }}</label>
                                    </div>
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block" type="submit">{{ __('Login') }}</button>
                                </div>

                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            @if (Route::has('password.request'))
                                <p> <a href="{{ route('password.request') }}" class="text-muted ml-1"><i class="fa fa-lock mr-1"></i>{{ __('Forgot Your Password?') }}</a></p>
                            @endif

                            @if (Route::has('register'))
                                <p class="text-muted">{{ __('Dont have an account?') }} <a href="{{ route('register') }}" class="text-dark ml-1"><b>{{ __('Sign Up') }}</b></a></p>
                            @endif
                            
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
@endsection
