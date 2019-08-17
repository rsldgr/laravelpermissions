@extends('layouts.dashboard')

@section('content')
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        
        <div class="row">
                <div class="col-md-8">
                    <div class="card-box">
                        <h4 class="mt-0 mb-3 header-title">{{ __('Edit Role') }}</h4>
                        <form role="form" method="post" action="{{ route('admin.roles.update',$role) }}">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $role->name }}" aria-describedby="nameHelp">
                                <small id="nameHelp" class="form-text text-muted">{{ __('Lütfen Başka birinin kullandığı name girmeyiniz') }}</small>
                                @error('name')<small id="nameError" class="form-text alert alert-danger">{{ $message }}</small>@enderror
                            </div>
                                

                            <div class="form-group">
                                <label for="message">{{ __('message address') }}</label>
                                <textarea rows="5" class="form-control @error('message') is-invalid @enderror" name="message" aria-describedby="messageHelp">{{ $role->message }}</textarea>
                                <small id="messageHelp" class="form-text text-muted">{{ __('Detaylı Bilgi Verebilirsiniz') }}</small>
                                @error('message')<small id="messageError" class="form-text alert alert-danger">{{ $message }}</small>@enderror
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
