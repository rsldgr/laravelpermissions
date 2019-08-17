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
                            <div class="form-group">
                                    <label for="permissions">{{ __('Role Permissions') }}</label>
                                    
                                    <select id="permissions" name="permissions[]" class="form-control select2 select2x select2-multiple" multiple="multiple" multiple data-placeholder="Choose ...">
                                                   
                                            <option value="AL">Alabama</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TX">Texas</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="WI">Wisconsin</option>
                                
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="IN">Indiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="OH">Ohio</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WV">West Virginia</option>
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