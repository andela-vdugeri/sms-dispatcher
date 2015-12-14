@extends('layouts.app')


@section('nav')
	@include('partials.admin-nav');
@endsection


@section('content')
	<div class="container">
		<div class="bs-example" style="margin-top:120px">
	    <table class="table table-striped table-responsive" id="payments-table">
	      <thead>
	        <tr>
	          <td>#</td>
	          <td>Username</td>
	          <td>Amount</td>
	          <td>Payment Date</td>
	          <td>Action</td>
	        </tr>
	      </thead>
	      <tbody>
	      	@foreach($payments as $payment)
	        <tr>
	          <td>{{ $payment->id }}</td>
	          <td>{{ $payment->user->name}}</td>
	          <td>{{ $payment->amount }}</td>
	          <td>{{ $payment->created_at }}</td>
	          <td><a href="#" id="confirm-payment" data-id="{{ $payment->id }}">Confirm</a></td>
	         @endforeach
	        </tr>
		 </tbody>
	    </table>
	  </div>
	</div>
@endsection