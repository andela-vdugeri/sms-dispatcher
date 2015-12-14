

@extends('layouts.app')
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
@section('nav')
    @include('partials.nav')
@endsection

@section('content')
    <div class="container paper-back">
        <ul class="nav nav-tabs" style="margin-top: 70px;">
            <li role="presentation"><a href="{{ route('messages.page') }}">Send Messages</a></li>
            <li role="presentation" class="active"><a href="{{ route('messages.get.units') }}">Get Units</a></li>
            <li role="presentation"><a href="{{ route('messages.history') }}">History</a></li>
        </ul>

        @if(Session::has('info'))
            <script>
                swal({
                        title: "Success",
                        text: "{!!Session::get('info') !!}",
                        type: "success",   
                        confirmButtonText: "Ok" 
                    });
            </script>
        @endif
       
    	<div class="absolute-center">
        <div class="text-center">
            <div class="transparent-div animated fadeInUp animation-delay-8">
                <h2 class="animated fadeInDown animation-delay-10">Important</h2>
                <div id="getting-started" class="animated fadeInLeft animation-delay-7">
                </div>
                <p>To make cash payments, you can pay into any of the following accounts, with your username as the payers name. To confirm payments, fill out the form provided here.</p>
                <ul class="bank-account-details">
                	<li>0019968579- Arizechukwu Nzekwe (Access Bank)</li>
					<li>0039363098- Arizechukwu Nzekwe (Diamond Bank)</li>
					<li>0041958161- Arizechukwu Nzekwe (Union Bank)</li>
                </ul>
                <p>For online transfers, use the description to notify us about payments.</p>
                <span style='text-align:left'>
                <pre>
                	Payment: Latter Africa SMS
                </pre>
                </span> 
                <form method="post" action="{{ route('payments.request') }}">
                	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                	<div class="form-group">
                    <input type="text" class="form-control" placeholder="username(for cash payments)" name="username">
                </div>
                <div class="form-group">
                	<input type="text" class="form-control" placeholder="description(for online transfers)" name="description">
                </div>
                <div class="form-group">
                	<input type="text" class="form-control" placeholder="amount paid" name="amount">
                </div>
                <div class="form-group">
                	<span class="input-group-btn">
                        <input class="btn btn-ar btn-primary" type="submit" value="Confirm Payment">
                    </span>
                </div>
               </form>
            </div>
        </div>
    	</div>
    </div>

@endsection