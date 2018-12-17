@extends('layout.index')


@section('title','Show All Invoice')

@section('css')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @endsection

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
                                <th>Profile</th>
                                <th>Phone</th>
                                <th>Handler </th>
                                <th>Amount </th>
                                <th>Created</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($invoices as $invoice)
                                <tr>
                                    <td>{{ $invoice->client->first_name.' '.$invoice->client->last_name }}</td>
                                    <td>{{ $invoice->client->phone }}</td>
                                    <td>{{ $invoice->user->name.' ('.$invoice->user->role->name.')' }}</td>
                                    <td>{{ $invoice->amount }}</td>
                                    <td>{{ \Carbon\Carbon::parse($invoice->created_at)->format('d M , Y') }}</td>
                                    <td>
                                        <label class="badge badge-danger">{{ $invoice->status->status }}</label>
                                    </td>

                                    <td>
                                        <a href="" class="btn btn-outline-info btn-sm">Message</a>

                                        @if($invoice->status->status =='pending')

                                            @if(Auth::user()->role->accesses->where('access','edit invoice')->count() > 0)
                                        <a href="{{ route('invoice.edit',$invoice->id) }}" class="btn btn-outline-success btn-sm">Edit</a>
                                            @endif

                                            @if(Auth::user()->role->accesses->where('access','delete invoice')->count() > 0)
                                        <button value="{{ $invoice->id }}" class="btn delete_button btn-outline-danger btn-sm">Delete</button>
                                                @endif
                                            @endif
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

    @if(Auth::user()->role->accesses->where('access','delete invoice')->count() > 0)

    <div class="modal fade" id="exampleModal-3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-3" aria-hidden="true">
        <div class="modal-dialog modal-sm " role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <p class="text-center">Are you sure you want to delete the invoice!!</p>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-danger button_cofirm">Delete</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    @endif




    @endsection


@section('script')



    <script src="{{ asset('theme-style/assets/js/shared/data-table.js') }}"></script>

    @if(Auth::user()->role->accesses->where('access','delete invoice')->count() > 0)

        <script>
            $(document).ready(function () {


                $('.delete_button').on('click',function () {


                    $('.button_cofirm').val($(this).val())

                    $('#exampleModal-3').modal('show');


                });

                $('.button_cofirm').on('click',function () {

                    $.ajax({

                        url: '/invoice/delete/'+$(this).val(),
                        type: 'POST',
                        data: { "_token": $('meta[name="csrf-token"]').attr('content') },
                        success: function(response)
                        {
                            if (response == 'deleted'){

                                location.reload();


                            }
                        }

                    })


                });




            });


        </script>

    @endif



@endsection