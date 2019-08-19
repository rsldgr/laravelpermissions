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
                                        <input id="is_admin" name="is_admin" value="1" type="checkbox" @if ($user->is_admin == 1 ) checked @endif>
                                        <label for="is_admin">
                                            {{ __('Is Admin') }}
                                        </label>
                                    </div>
                                </div>
    
                                <div class="form-group">
                                    <div class="checkbox">
                                        <input id="is_banned" name="is_banned" value="1" type="checkbox" @if ($user->is_banned == 1 ) checked @endif>
                                        <label for="is_banned">
                                            {{ __('Is Banned') }}
                                        </label>
                                    </div>
                                </div>
                            <div class="form-group">
                                    <label for="permissions">{{ __('Role Permissions') }}</label>
                                    
                                    <select id="permissions" name="permissions[]" class="form-control select2 select2x select2-multiple" multiple="multiple" multiple data-placeholder="Choose ...">
                                        @foreach ($permissions as $permission)
                                            <option @if($user->permissions->contains($permission->id)) selected @endif value="{{ $permission->id }}">{{ $permission->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                        <label for="roles">{{ __('Role roles') }}</label>
                                        
                                        <select id="roles" name="roles[]" class="form-control select2 select2x select2-multiple" multiple="multiple" multiple data-placeholder="Choose ...">
                                            @foreach ($roles as $role)
                                                <option @if($user->roles->contains($role->id)) selected @endif value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
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


@push('scripts')
    <script src="{{ mix('js/form.js') }}" defer></script>
@endpush

@push('styles')
    <link href="{{ mix('css/form.css') }}"  rel="stylesheet" type="text/css" />

@endpush