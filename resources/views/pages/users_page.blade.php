@extends('layout.index')

@section('title','Users')

@section('container')



        <div class="col-md-9 col-sm-12 grid-margin stretch-card">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">User Table</h4>
                    <div class="row">
                        <div class="col-12">
                            <table id="order-listing" class="table">
                                <thead>
                                <tr>


                                    <th>Name</th>

                                    <th>Status</th>
                                    <th>email</th>

                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $user)
                                <tr>


                                    <td>{{ $user->name }}</td>


                                    <td>
                                        <label class="badge badge-info">{{ strtoupper($user->role->name) }}</label>
                                    </td>
                                    <td>{{ $user->email }}</td>

                                    <td>
                                        <button class="btn btn-outline-primary">View</button>
                                    </td>
                                </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-3 col-sm-12 grid-margin stretch-card">


            <div class="row">

                <div class="col-12">

                    <div class="card">

                        <div class="card-body">

                            <a href="{{ route('register') }}"  class="btn btn-outline-primary btn-block  btn-fw ">
                                <i class="mdi mdi-account-plus"></i>Create User</a>
                            <a href="" class="btn btn-outline-info btn-block  btn-fw ">
                                <i class="mdi mdi-account-group"></i>User Group</a>

                        </div>



                    </div>



                </div>

            </div>






        </div>






    @endsection

@section('script')

    <script src="{{ asset('theme-style/assets/js/shared/data-table.js') }}"></script>

    @endsection