@extends('layout.index')

@section('title','Add Invoice')

@section('container')


    <div class=" offset-2 col-md-8 grid-margin stretch-card ">
        <div class="card">
            <h4 class="card-header text-center">Generate Invoice</h4>
            <div class="card-body">


                <form class="tab-content tab-content-basic">

                                {{--handler id--}}
                                <div class="form-group">

                                    <label>Handler Name</label>
                                    <select class="form-control" name="user_id"  required>

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
                                    <input class="form-control" type="text" name="invoice_for" placeholder="insert deatails for payment" required/>

                                </div>
                                {{--end invoice for--}}

                                {{--amount and confirm_amount--}}
                                <div class="form-group row">

                                    <div class="col">

                                        <label>Amount</label>
                                        <input class="form-control" type="text" name="amount" placeholder="Insert Required Amount" required/>

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
                        <div class="d-flex justify-content-center">

                            <i class="menu-icon alert alert-danger mdi mdi-check mdi-36px"></i>

                        </div>

                        <div class="card-body">


                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Profile</th>
                                    <th>VatNo.</th>
                                    <th>Created</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Jacob</td>
                                    <td>53275531</td>
                                    <td>12 May 2017</td>
                                    <td>
                                        <label class="badge badge-danger">Pending</label>
                                    </td>
                                </tr>

                                </tbody>
                            </table>


                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success" data-dismiss="modal">Create Invoice</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>







    @endsection

@section('script')


    <script>


        $(document).ready(function () {


            /*for create button*/

            $('.create_invoice_button').on('click',function () {

                $('#create_invoice_modal').modal('show');


            });




        });

    </script>

    @endsection

