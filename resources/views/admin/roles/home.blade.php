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
                                <div class="dropdown float-right">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                    </div>
                                </div>
                                <h4 class="mt-0 header-title">{{ __('User List') }}</h4>
                                <p class="text-muted font-14 mb-3">
                                        {{ __('User List Information') }}
                                </p>
                        
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('Role Name') }}</th>
                                                <th>{{ __('Message') }}</th>
                                                <th>{{ __('Permissions') }}</th>
                                                <th>{{ __('Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($roles as $role)
                                                
                                                <tr>
                                                    <th scope="row"><a class="text-dark" href="{{ route('admin.roles.edit',$role) }}">{{  $role->id }}</th>
                                                    <td><a class="text-dark" href="{{ route('admin.roles.edit',$role) }}">{{  $role->name }}</td>
                                                    <td><a class="text-dark" href="{{ route('admin.roles.edit',$role) }}">{{  $role->message }}</td>
                                                    <td><a class="text-dark" href="{{ route('admin.roles.edit',$role) }}">{{  $role->permissions()->pluck('name')->implode(' , ') }}</td>
                                                    
                                                    <td>
                                                        <form class="form-inline float-left mr-1" method="POST" action="{{ route('admin.roles.delete',$role) }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-xs btn-icon waves-effect waves-light btn-danger text-white"> 
                                                                <i class="fas fa-times"></i> 
                                                            </button>
                                                        </form>
                                                        <a href="{{ route('admin.roles.edit',$role) }}" class="btn btn-xs btn-icon waves-effect waves-light btn-warning text-white"> 
                                                            <i class="fa fa-wrench"></i> 
                                                        </a>
                                                    </td>

                                                </tr>    
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                </div>
                <!-- end col -->
        
                <div class="col-md-4">
                    <div class="card-box">
                        <h4 class="mt-0 mb-3 header-title">{{ __('User Information') }}</h4>
        
                        {{ __('please Select User') }}
                    </div>
                </div>
        
            </div>
            <!-- end row -->
        
@endsection
