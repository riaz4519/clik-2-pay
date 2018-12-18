@extends('layout.client')




@section('title',ucwords($invoice->client->first_name.' '.$invoice->client->last_name).' | Welcome')



@section('container')

    <div class="col-md-6 col-lg-4 col-sm-12  mx-auto" >
        <div class="card text-center" >
            <div class="card-body ">
                <div class="wrapper">
                    <i class="mdi mdi-account-circle mdi-48px text-dark"></i>
                    <h4 class="">{{ ucwords($invoice->client->first_name .' '. $invoice->client->last_name) }}</h4>
                    <p class="text-dark btn {{ $invoice->status->status == 'pending'? 'btn-danger':'btn-success'}}">{{ ucwords($invoice->status->status) }}</p>
                    <p class="mt-4 card-title  text-justify">Dear {{ ucwords($invoice->client->first_name .' '. $invoice->client->last_name) }},<br>
                        has requested an amount of <span class="text-dark ">{{ number_format($invoice->amount) }}</span> BDT on behalf of the Global Consultants Ltd to continue
                        your process of application for {{ $invoice->invoice_for }}.
                    </p>

                    @if($invoice->status->status == 'pending')

                        <p>To continue the Payment,Please click below</p>

                    <a href=" " class="btn btn-outline-success">Pay {{ $invoice->amount }} BDT </a>

                        @elseif($invoice->status->status == 'paid')

                        <p class="text-left text-dark card-title border border-success p-2 " style="font-size: 1.0em;border-radius: 3px">You Have made the payment on the date of {{ \Carbon\Carbon::parse($invoice->updated_at)->format('d M,Y') }}.</p>


                        @endif
                </div>

            </div>
        </div>
    </div>

    @endsection