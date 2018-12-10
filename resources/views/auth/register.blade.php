{{--
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="text" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" >

                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
--}}

@extends('layout.index')

@section('title','Registration')

@section('container')


    <div class="offset-md-2 col-sm-12 col-md-8 grid-margin stretch-card" xmlns="http://www.w3.org/1999/html">

        <div class="card">

            <div class="card-body">
                <h3 class="card-title">Register User</h3>

                <form method="POST" action="{{ route('register') }}" class="forms-sample cmx">
                    @csrf

                    <div class="form-group row">

                        <div class="col">

                            <label>Full Name:</label>
                            <input class="form-control" type="text" name="name" required/>

                        </div>
                        <div class="col">

                            <label for="user_role">User Role:</label>
                            <select name="role_id" class="form-control  border-primary" id="user_role" required>

                                <option></option>
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ strtoupper($role->name)  }}</option>
                                    @endforeach

                            </select>


                        </div>

                    </div>

                    <div class="form-group">
                        <label>Email:</label>
                        <input class="form-control" data-inputmask="'alias': 'email'"  name="email" required/>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label>password:</label>
                            <input class="form-control" type="password" name="password" required/>
                        </div>
                        <div class="col">
                            <label>Confirm Password:</label>
                            <input class="form-control" name="password_confirmation" type="password" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label>Phone:</label>
                            <input class="form-control" type="text" name="phone" /> </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-success btn-lg btn-block btn-fw">Success</button>

                    </div>

                </form>
            </div>

        </div>



    </div>




    @endsection

@section('script')

    <script src="{{ asset('theme-style/assets/js/shared/file-upload.js') }}"></script>
    <script src="{{ asset('theme-style/assets/js/shared/alerts.js') }}"></script>
    <script src="{{ asset('theme-style/assets/js/shared/avgrund.js') }}"></script>

    <script>


        @if(Session::has('message'))

        $(document).ready(function () {

            showSwal('success-message','Success','Your User Is Registered');

        });
        @endif

    </script>


    @endsection
