@extends('layout.index')

@section('title','Paid Section')

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
                                <th>VatNo.</th>
                                <th>Created</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
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
        </div>

    </div>

@endsection

@section('script')

    <script src="{{ asset('theme-style/assets/js/shared/data-table.js') }}"></script>

@endsection

