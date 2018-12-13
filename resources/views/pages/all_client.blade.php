@extends('layout.index')

@section('title','Client')

@section('container')

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data table</h4>
                    <div class="row">
                        <div class="col-12">
                            <table id="order-listing" class="table">
                                <thead>
                                <tr>
                                    <th>Order #</th>
                                    <th>Full Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>company</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($clients as $client)
                                <tr>


                                    <td>{{ $client->id }}</td>
                                    <td>{{ $client->first_name.' '.$client->last_name }}</td>
                                    <td>{{ $client->phone }}</td>
                                    <td>{{  $client->email }}</td>
                                    <td>{{ $client->company }}</td>


                                    <td>
                                        <a href="" class="btn btn-outline-primary">View</a>
                                        <a href="{{ route('invoice.create',$client->id) }}" class="btn btn-outline-primary">Add Invoice</a>
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

    @endsection


@section('script')


    <script src="{{ asset('theme-style/assets/js/shared/data-table.js') }}"></script>

    @endsection