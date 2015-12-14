@extends('layouts.app')


@section('nav')
	@include('partials.admin-nav')
@endsection


@section('content')
	<section>
		<div class="row" style="margin-top: 120px;">
		<div class="col-md-4 col-sm-6 col-md-offset-4">
        <div class="pricign-box pricign-box-pro animated fadeInUp animation-delay-9">
            <div class="pricing-box-header">
                <h2>SMS Pricing Rate</h2>
                <p>This pricing is same accross all networks</p>
            </div>
            <div class="pricing-box-price">
                <h3>NGN {{ $pricing->unit_price}} <sub>/ SMS</sub> </h3>
            </div>
            <div class="pricing-box-content">
                <ul>
                    <li><i class="fa fa-envelope"></i>MTN (NGN {{ $pricing->unit_price}} <sub>/ SMS</sub>)</li>
                    <li><i class="fa fa-envelope"></i> AIRTEL (NGN {{ $pricing->unit_price }} <sub>/ SMS</sub>)</li>
                    <li><i class="fa fa-envelope"></i> GLO (NGN {{ $pricing->unit_price }} <sub>/ SMS</sub>)</li>
                    <li><i class="fa fa-envelope"></i> ETISALAT (NGN {{ $pricing->unit_price }} <sub>/ SMS</sub>)</li>
                </ul>
            </div>
            <div class="pricing-box-footer">
                <button class="btn btn-ar btn-primary" id="pricing" data-id='{{ $pricing->id}} '>Adjust</button>
            </div>
        </div>
    </div>
	</div>
	</section>
@endsection