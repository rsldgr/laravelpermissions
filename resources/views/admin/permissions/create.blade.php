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
                        <h4 class="mt-0 mb-3 header-title">{{ __('Create New Permission') }}</h4>
        
                        <form role="form" method="POST" action="{{ route('admin.permissions.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">{{ __('Permission Name') }}</label>
                                <input type="name" name="name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter name">
                                <small id="nameHelp" class="form-text text-muted">{{ __('Permission Kullanım Adını Giriniz : article-edit gibi') }}</small>
                            </div>
                            <div class="form-group">
                                <label for="message">{{ __('Message') }}</label>
                                <textarea class="form-control" name="message" rows="5"></textarea>
                                <small id="messageHelp" class="form-text text-muted">{{ __('Detaylı Bilgi Verebilirsiniz') }}</small>
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
