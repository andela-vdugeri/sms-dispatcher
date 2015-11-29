@extends('layouts.app')

@section('nav')
    @include('partials.nav')
@endsection

@section('content')
    <div class="container">
        <ul class="nav nav-tabs" style="margin-top: 70px;">
            <li role="presentation"><a href="{{ route('messages.page') }}">Send Messages</a></li>
            <li role="presentation"><a href="{{ route('messages.get.units') }}">Get Units</a></li>
            <li role="presentation" class="active"><a href="{{ route('messages.history') }}">History</a></li>
        </ul>

        <div class="row" style="margin-top: 15px;">
            @foreach($transactions as $transaction)
                <div class="col-md-4 col-sm-6">
                    <div class="pricign-box animated fadeInUp animation-delay-7">
                        <div class="pricing-box-header">
                            <h2>Transaction</h2>
                            <p>{{ $transaction->created_at }}</p>
                        </div>
                        <div class="pricing-box-price">
                            <h3>{{ $transaction->message_units }} <sub> Unit(s)</sub> </h3>
                        </div>
                        <div class="pricing-box-content">
                            <ul>
                                <li><i class="fa fa-inbox"></i> Exercitation in id in officia.</li>
                                <li><i class="fa fa-cloud-download"></i> Exercitation in id in officia.</li>
                                <li><i class="fa fa-dashboard"></i> Exercitation in id in officia.</li>
                                <li><i class="fa fa-sitemap"></i> Exercitation in id in officia.</li>
                                <li><i class="fa fa-shopping-cart"></i> Exercitation in id in officia.</li>
                            </ul>
                        </div>
                        <div class="pricing-box-footer">
                            <a href="{{ route('history.delete') }}" class="btn btn-ar btn-default">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> <!-- row -->
    </div>
@endsection