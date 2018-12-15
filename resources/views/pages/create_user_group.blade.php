@extends('layout.index')

@section('title','Create Group')
@section('css')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @endsection

@section('container')

    <div class="col-lg-8 grid-margin stretch-card reload_after_done">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">User Group List</h4>

                <table class="table ">
                    <thead>
                    <tr>
                        <th>Group name</th>
                        <th>Added Task.</th>

                        @if(Auth::user()->role->accesses->where('access','edit user Group')->count() > 0)
                        <th>Action</th>
                            @endif

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($roles as $role)
                    <tr>
                        <td>
                            <label class="badge badge-danger">{{ strtoupper($role->name) }}</label>
                        </td>
                        @php($count = 0)
                        <td>@foreach($role->accesses as $access)@if($count % 3 == 0) <br class=""> @endif<label class="badge badge-info mt-2">{{ strtoupper($access->access) }}</label> @php($count++)  @endforeach</td>

                        @if(Auth::user()->role->accesses->where('access','edit user Group')->count() > 0)
                            <td><a href="{{ route('user_group.edit',$role->id) }}" class="btn btn-outline-info btn-sm">Edit</a></td>

                        @endif

                    </tr>

                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

    @if(Auth::user()->role->accesses->where('access','create user group')->count() > 0)
        <div class="col-lg-4 grid-margin ">
            <div class="card  bg-orange-gradient">
                <div class="card-body">
                    <h4 class="card-title text-center">Create User Group</h4>

                    <div class="form-group">
                        <div class="input-group ">
                            <input type="text" class="form-control create_group_input" placeholder="Insert group name" aria-label="Insert group name" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-info create_group_button" type="button">Create</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endif


    <div class="modal fade" id="exampleModal-3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-3" aria-hidden="true">
        <div class="modal-dialog modal-sm " role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <p>Are you sure you want to create a group</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success button_cofirm">Submit</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
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

            var text = new Array();

            text['text'] = 'You want to Create the user group!';
            text['class'] = 'button_confirm';



            $('.create_group_button').on('click',function () {

                var button_text = $('.create_group_input').val();
                if (button_text.length > 0){

                    $('#exampleModal-3').modal('show');

                }

            });

            $('.button_cofirm').on('click',function () {

                var button_text = $('.create_group_input').val();



                sendAjax(button_text);

                $('#exampleModal-3').modal('hide');
            });

            function sendAjax(data) {



                $.ajax({

                    url: '{{ route('user_group.create') }}',
                    type: 'POST',
                    data: { "_token": $('meta[name="csrf-token"]').attr('content'),"name":data },
                    success: function(response)
                    {
                       if (response == 'success'){

                           location.reload();


                       }
                    }

                });

            }


        });

    </script>





    @endsection