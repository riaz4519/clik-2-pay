@extends('layout.index')

@section('title','Create Group')

@section('container')

    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">User Group List</h4>

                <table class="table ">
                    <thead>
                    <tr>
                        <th>Group name</th>
                        <th>Added Task.</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($roles as $role)
                    <tr>
                        <td>
                            <label class="badge badge-danger">{{ strtoupper($role->name) }}</label>
                        </td>
                        <td>@foreach($role->accesses as $access) <label class="badge badge-info">{{ strtoupper($access->access) }}</label> @endforeach</td>
                        <td><a href="" class="btn btn-outline-info"> Edit/view </a></td>

                    </tr>

                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>


    @endsection