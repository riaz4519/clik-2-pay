@extends('layout.index')

@section('title','Create client')

@section('container')

    <div class="offset-md-2 col-sm-12 col-md-8 grid-margin stretch-card" xmlns="http://www.w3.org/1999/html"
         xmlns="http://www.w3.org/1999/html">

        <div class="card">

            <div class="card-body">
                <h3 class="text-center">Client Register</h3>

                <form method="POST" action="{{ route('client.store') }}" class="forms-sample cmx">
                    @csrf

                    <div class="form-group row">

                        <div class="col">

                            <label>First Name:</label>
                            <input class="form-control form-control-sm" type="text" name="first_name" required/>

                        </div>
                        <div class="col">

                            <label for="user_role">Last Name</label>
                            <input class="form-control  form-control-sm" type="text" name="last_name" required/>

                        </div>

                    </div>

                    <div class="form-group">
                        <label>Email:</label>
                        <input class="form-control  form-control-sm" data-inputmask="'alias': 'email'"  name="email" required/>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <label>Phone:</label>
                            <input class="form-control  form-control-sm" type="text" name="phone" required/>
                        </div>
                        <div class="col">
                            <label>city:</label>
                            <input class="form-control  form-control-sm" name="city" type="text" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <label>Post Code:</label>
                            <input class="form-control  form-control-sm" type="text" name="post_code" required />
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>company</label>
                                <input class="form-control  form-control-sm" type="text" name="company" required />

                            </div>

                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <label>Address1:</label>
                            <textarea class="form-control"  name="address1" required></textarea>
                        </div>

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-success btn-sm btn-block btn-fw">Success</button>

                    </div>

                </form>
            </div>

        </div>



    </div>

    @endsection

@section('script')

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