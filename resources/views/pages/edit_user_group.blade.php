@extends('layout.index')

@section('title','Edit User Group')

@section('css')

    <link rel="stylesheet" href="{{ asset('theme-style/assets/vendors/icheck/skins/all.css') }}">

    @endsection

@section('container')


    <div class="col-md-8 col-lg-8 col-sm-12 offset-lg-2 offset-md-2 ">
        <form action="{{ route('user_group.edit_store',$role->id) }}" method="post" class="card">

            {{ csrf_field() }}
            <div class="card-header ">

                <h4 class="text-center">Edit Access for  <label class="bold">{{ strtoupper($role->name) }}</label></h4>

            </div>
            <div class="card-body" >


                <table class="table">
                    <thead>
                    <tr>
                        <th>Permission</th>
                        <th class="text-center">Access.</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($permissions as  $permission)
                    <tr>
                        <td><label class="badge badge-info">{{ strtoupper($permission->name) }}</label></td>
                        <td class="icheck-square">


                            @php($count = 0)
                            @foreach($permission->accesses as $access)





                                @if($count % 3 == 0) <br > @endif
                                @php($count++)



                                    <input tabindex="5" class="mt-3 " name="access_id[]" value="{{ $access->id }}" type="checkbox" @if($role->accesses()->find($access->id)) {{ 'checked' }} @endif id="square-checkbox-{{ $access->id }}">
                                    <label  class="mt-3 ml-2" for="square-checkbox-{{ $access->id }}">{{ strtoupper($access->access) }}  </label>







                                @endforeach

                        </td>

                    </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex justify-content-center">

                <input type="submit" class="btn btn-outline-success btn-block" value="EDIT">

            </div>
        </form>
    </div>


    @endsection

@section('script')

    <script src="{{ asset('theme-style/assets/js/shared/alerts.js') }}"></script>
    <script src="{{ asset('theme-style/assets/js/shared/avgrund.js') }}"></script>

    <script src="{{ asset('theme-style/assets/js/shared/iCheck.js') }}"></script>

    <script>


        @if(Session::has('message'))

        $(document).ready(function () {

            showSwal('success-message','Success','Successfully Edited Access');

        });
        @endif

    </script>





    @endsection