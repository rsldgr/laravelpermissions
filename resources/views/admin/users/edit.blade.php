@extends('layouts.dashboard')

@section('content')
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

         {{--
            TODO:: Daha sonra buraya dön ve admin kullanıcısını düzenleme değiştirme silme yetkisini permissionlara bağla    
            Admin kullanıcısı bu sayfaya girebiliyorsa 
            her kullanıcıyı düzenleme yetkisi vardır zaten. o yüzden ID kontrolü vs yapmıyorum
            --}}
        <div class="row">
                <div class="col-md-8">
                    <div class="card-box">
                        <h4 class="mt-0 mb-3 header-title">{{ __('Edit User') }}</h4>
                        <form role="form" method="post" action="{{ route('admin.users.update',$user) }}">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" aria-describedby="nameHelp">
                                <small id="nameHelp" class="form-text text-muted">{{ __('Lütfen Başka birinin kullandığı name girmeyiniz') }}</small>
                                @error('name')<small id="nameError" class="form-text alert alert-danger">{{ $message }}</small>@enderror
                            </div>
                                

                            <div class="form-group">
                                <label for="email">{{ __('Email address') }}</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" aria-describedby="emailHelp">
                                <small id="emailHelp" class="form-text text-muted">{{ __('Lütfen Başka birinin kullandığı email girmeyiniz') }}</small>
                                @error('email')<small id="emailError" class="form-text alert alert-danger">{{ $message }}</small>@enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                                <small id="passwordHelp" class="form-text text-muted">{{ __('Değiştirmek İstemiyorsanız Boş Bırakın') }}</small>
                                @error('password')<small id="passwordError" class="form-text alert alert-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <input id="checkbox0" type="checkbox">
                                    <label for="checkbox0">
                                        Check me out
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- end col -->
        
                <div class="col-md-4">
                    <div class="card-box">
                        <h4 class="mt-0 mb-3 header-title">Horizontal form</h4>
        
                        Detaylı bilgilendirme yapılacak
                    </div>
                </div>
        
            </div>
            <!-- end row -->
        
@endsection
