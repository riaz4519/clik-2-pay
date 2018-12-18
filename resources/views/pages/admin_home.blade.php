@extends('layout.index')

{{--title--}}

@section('title',__('Dashboard | '.Auth::user()->role->name))


@section('container')

    <div class="col-md-3 col-sm-12 grid-margin stretch-card">
        <div class="card card-statistics bg-green-gradient">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <i class="mdi mdi-cube icon-lg"></i>
                    </div>
                    <div class="float-right">
                        <p class="mb-0 text-right">Total invoice</p>
                        <div class="fluid-container">
                            <h3 class="font-weight-medium text-right mb-0">BDT {{ number_format($invoice->sum('amount') )}}</h3>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i>Total Invoice value </p>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-12 grid-margin stretch-card">
        <div class="card card-statistics bg-orange-gradient">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <i class="mdi mdi-receipt icon-lg"></i>
                    </div>
                    <div class="float-right">
                        <p class="mb-0 text-right">Due</p>
                        <div class="fluid-container">
                            <h3 class="font-weight-medium text-right mb-0">BDT {{number_format($invoice->where('status_id','1')->sum('amount')) }}</h3>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0">
                    <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Due left </p>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-12 grid-margin stretch-card">
        <div class="card card-statistics bg-blue-gradient">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <i class="mdi mdi-poll-box icon-lg"></i>
                    </div>
                    <div class="float-right">
                        <p class="mb-0 text-right">Collected</p>
                        <div class="fluid-container">
                            <h3 class="font-weight-medium text-right mb-0">BDT {{number_format($invoice->where('status_id','2')->sum('amount')) }}</h3>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0">
                    <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i>Total Paid</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-12 grid-margin stretch-card">
        <div class="card card-statistics bg-green-gradient">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <i class="mdi mdi-cube icon-lg"></i>
                    </div>
                    <div class="float-right">
                        <p class="mb-0 text-right">Invoice</p>
                        <div class="fluid-container">
                            <h3 class="font-weight-medium text-right mb-0">{{ number_format($invoice->count() )}}</h3>
                        </div>
                    </div>
                </div>
                <p class="mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total Number of Invoice </p>
            </div>
        </div>
    </div>
    <div class="col-md-9 col-sm-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Last 5 Due Invoice</h4>

                <table class="table">
                    <thead>
                    <tr>
                        <th>Profile</th>
                        <th>VatNo.</th>
                        <th>Created</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->client->first_name.' '.$invoice->client->last_name }}</td>
                            <td>{{ $invoice->user->name.' ('.$invoice->user->role->name.')' }}</td>
                            <td>{{ \Carbon\Carbon::parse($invoice->created_at)->format('d M , Y') }}</td>
                            <td>
                                <label class="badge badge-danger">{{ $invoice->status->status }}</label>
                            </td>

                            <td>
                                <a href="{{ url('/'.$invoice->url_short) }}" class="btn btn-outline-success btn-sm">View</a>
                            </td>
                        </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div class="col-md-3 col-sm-12 grid-margin stretch-card">



        <div class="row">

            <div class="col-md-12 col-sm-12 grid-margin stretch-card">
                <div class="card card-statistics bg-green-gradient">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <i class="mdi mdi-cash-usd icon-lg"></i>
                            </div>
                            <div class="float-right">
                                <p class="mb-0 text-right">Todays income</p>
                                <div class="fluid-container">
                                    <h3 class="font-weight-medium text-right mb-0">BDT {{ number_format($invoice->whereDate('updated_at',\Carbon\Carbon::today())->where('status_id',2)->sum('amount')) }}</h3>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0">
                            <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> <a class="btn btn-sm btn-social-outline-reddit"> View Transaction </a> </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 grid-margin stretch-card">
                <div class="card card-statistics bg-orange-gradient">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <i class="mdi mdi-file-document-box icon-lg"></i>
                            </div>
                            <div class="float-right">
                                <p class="mb-0 text-right">Generated Today</p>
                                <div class="fluid-container">
                                    <h3 class="font-weight-medium text-right mb-0">{{ $generated_today }}</h3>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0">
                            <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> <a class="btn btn-sm btn-social-outline-reddit"> Have a look!!</a> </p>
                    </div>
                </div>
            </div>


        </div>






    </div>

    @endsection