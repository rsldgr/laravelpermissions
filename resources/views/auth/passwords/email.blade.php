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
                                    <h4 class="text-uppercase mt-0 mb-3">{{ __('Reset Password') }}</h4>
                                    <p class="text-muted mb-0 font-13">Enter your email address and well send you an email with instructions to reset your password.  </p>

                                </div>
								@if (session('status'))
									<div class="alert alert-success" role="alert">
										{{ session('status') }}
									</div>
								@endif
                                <form method="POST" action="{{ route('password.email') }}">
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

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> {{ __('Send Password Reset Link') }} </button>
                                    </div>

                                </form>        

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
						@if (Route::has('login'))
							<div class="row mt-3">
								<div class="col-12 text-center">
									<p class="text-muted">{{ __('Back to') }}  <a href="{{ route('login') }}" class="text-dark ml-1"><b>{{ __('Log in') }}</b></a></p>
								</div> <!-- end col -->
							</div>    
						@endif
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
    
@endsection
