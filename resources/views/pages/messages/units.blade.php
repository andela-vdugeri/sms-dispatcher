

@extends('layouts.app')
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
@section('nav')
    @include('partials.nav')
@endsection

@section('content')
    <div class="container paper-back">
        <ul class="nav nav-pills nav-justified ar-nav-pills  max-width-500 center-block margin-bottom">
            <li><a href="{{ route('messages.page') }}" data-toggle="tab">Send Messages</a></li>
            <li role="presentation" class="active"><a href="{{ route('messages.get.units') }}">Buy SMS</a></li>
            <li role="presentation"><a href="{{ route('messages.history') }}">History</a></li>
            <li role="presentation"><a href="{{ route('schedule.loadPage') }}">Schedule SMS</a></li>
        </ul>

        <div class="tab-content margin-top">
             <div class="tab-pane">
                 
             </div>
             <div class="tab-pane">
                 
             </div>
             <div class="tab-pane">
                 
             </div>
        </div>

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
                <div id="getting-started" class="animated fadeInLeft animation-delay-7">
                </div>
                <p>To make cash payments, you can pay into any of the following accounts, with your username as the payers name. To confirm payments, fill out the form provided here.</p>
                <ul class="bank-account-details">
                	<li>0019968579- Arizechukwu Nzekwe (Access Bank)</li>
					<li>0039363098- Arizechukwu Nzekwe (Diamond Bank)</li>
					<li>0041958161- Arizechukwu Nzekwe (Union Bank)</li>
                </ul>
                <p><h2>A unit costs NGN {{ $pricing->unit_price }}</h2></p>
                <p class="bank-account-details">
                    For online transfers, your description should be in this format:
                    <span style='text-align:left'>
                        <h2>Payment: Latter Africa SMS</h2>
                    </span> 
                </p>
                <div class="form-group">
                    <span class="input-group-btn">
                        <button class="btn btn-ar btn-primary" type="submit" data-target="#confirmModal" data-toggle="modal">Confirm Payment</button>
                    </span>
                </div>
            </div>
    	</div>
    </div>
@endsection

<!-- modal -->
<div class="modal fade" id="confirmModal" role="dialog" tabindex="-1" style="margin-top:70px;">
    <div class="modal-dialog">

    <!-- modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Confirm Payment</h4>
        </div>
        <div class="modal-body">
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
        
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" id="make-payment">Confirm</button>
        </div>
    </div>
 </div>
</div> <!--- end Modal -->