@extends('layout.index')

@section('title','Add Invoice')

@section('container')


    <div class=" offset-2 col-md-8 grid-margin stretch-card ">
        <div class="card">
            <h4 class="card-header text-center">Generate Invoice</h4>
            <div class="card-body">


                <form method="post" action="{{ route('invoice.store',$client->id) }}" class="tab-content tab-content-basic" id="invoice_form">

                    {{ csrf_field() }}
                                {{--handler id--}}
                                <div class="form-group">

                                    <label>Handler Name</label>
                                    <select class="form-control border border-danger handler_name" name="user_id"  required>

                                        <option></option>

                                        @foreach($roles as $role)

                                            @foreach($role->users as $user)

                                                <option value="{{ $user->id }}">{{ $user->name }}</option>

                                            @endforeach

                                        @endforeach

                                    </select>

                                </div>
                                {{--end handler id--}}

                                {{--invoice for--}}
                                <div class="form-group">

                                    <label>Invoice For</label>
                                    <input class="form-control invoice_for" type="text" name="invoice_for" placeholder="insert deatails for payment" required/>

                                </div>
                                {{--end invoice for--}}

                                {{--amount and confirm_amount--}}
                                <div class="form-group row">

                                    <div class="col">

                                        <label>Amount</label>
                                        <input class="form-control amount" type="text" name="amount" placeholder="Insert Required Amount" required/>

                                    </div>

                                </div>

                                {{--end amount--}}

                                <div class="form-group d-flex flex-row-reverse">

                                    <button type="button" class="btn btn-outline-success create_invoice_button">Create</button>

                                </div>





                        </form>
            </div>


        </div>
    </div>

    <div class="modal fade" id="create_invoice_modal" tabindex="-1" role="dialog" aria-labelledby="create_invoice_modal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">


                <div class="modal-body">
                    <div class="card">

                        <div class="card-header text-center">
                            Are You Sure!!
                        </div>

                        <div class="card-body">


                            <table class="table table-bordered">
                                <thead>

                                <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ strtoupper($client->first_name.' '.$client->last_name) }}</td>
                                </tr>
                                <tr>
                                    <th>Invoice  for</th>
                                    <td class="invoice_for_table"></td>
                                </tr>

                                <tr>
                                    <th>Handler Name:</th>
                                    <td class="handler_name_table"></td>
                                </tr>
                                <tr>
                                    <th>Amount</th>
                                    <td class="amount_for_table"></td>
                                </tr>

                                </tbody>
                            </table>


                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success  invoice_submit_button" data-dismiss="modal">Create Invoice</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>







    @endsection

@section('script')

    <script src="{{ asset('theme-style/assets/js/shared/alerts.js') }}"></script>
    <script src="{{ asset('theme-style/assets/js/shared/avgrund.js') }}"></script>


    <script>


        $(document).ready(function () {


            /*for create button*/

            $('.create_invoice_button').on('click',function () {


                var handler_name = returnLenght($('.handler_name'));
                var invoice_for = returnLenght($('.invoice_for'));
                var amount = returnLenght($('.amount'));

                if (handler_name  >  0 && invoice_for >0 && amount >0){


                    $('.amount_for_table').text($('.amount').val());
                    $('.invoice_for_table').text($('.invoice_for').val());
                    $('.handler_name_table').text($('.handler_name').text());

                    $('#create_invoice_modal').modal('show');

                }else{


                    if (handler_name == 0){

                        $('.handler_name').addClass('bg bg-danger');


                    }else{
                        $('.handler_name').removeClass('bg bg-danger');
                    }


                    if (invoice_for == 0){

                        $('.invoice_for').addClass('bg bg-danger');


                    }else{
                        $('.invoice_for').removeClass('bg bg-danger');
                    }

                    if (amount == 0){

                        $('.amount').addClass('bg bg-danger');


                    }else{
                        $('.amount').removeClass('bg bg-danger');
                    }


                }





            });

            $('.invoice_submit_button').on('click',function () {

                $('#invoice_form').submit();


            });

            function returnLenght($string) {


                return $string.val().length;

            }




        });

    </script>

    <script>


        @if(Session::has('message'))

        $(document).ready(function () {

            showSwal('success-message','Invoice','Invoice created Successfully');


        });
        @endif

    </script>

    @endsection


