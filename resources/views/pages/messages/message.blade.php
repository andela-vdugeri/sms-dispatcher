@extends('layouts.app')

@section('nav')
	@include('partials.nav');
@stop

@section('content')
	<ul class="nav nav-pills nav-justified ar-nav-pills center-block margin-top max-width-600">
		<li class="send-sms active"><a href="#send-sms" data-toggle="tab"><i class="fa fa-paper-plane"></i>Send Sms</a></li>
		<li><a href="#buy-sms" data-toggle="tab"><i class="fa fa-shopping-cart"></i>Buy Sms</a></li>
		<li><a href="#history" data-toggle="tab"><i class="fa fa-history"></i>History</a></li>
		<li><a href="#schedule-messages" data-toggle="tab"><i class="fa fa-clock-o"></i>Schedule Messages</a></li>
	</ul>

	<div class="tab-content margin-top">
		<div class="tab-pane active" id="send-sms">
			  <div class="col-md-7 col-lg-offset-2">
                <div class="panel panel-info-dark animated fadeInDown" style="margin-top: 70px;">
                    <div class="panel-heading">Send Messages</div>
                    <div class="panel-body">
                      @if (session()->has('info'))
                        <div class="alert-success text-center"><h2>{{ session()->get('info') }}</h2></div>
                      @endif
                        <form  method="post" id="message-form" action="{{ route('message.send')}}">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="form-group">
                                <label for="InputPhoneNumbers">Receiver Phone Numbers(separated by commas)<sup>*</sup></label>
                                <textarea name="numbers" placeholder="Receiver cell phone numbers... eg 07089898998,08097878667 ..."
                                          id="inputPhoneNumbers" class="form-control" rows="5">{{Input::old('numbers')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputMessage">Message<sup>*</sup></label>
                                <textarea id="inputMessage" class="form-control" name="message" placeholder="Text message here..."
                                          rows="5">{{ Input::old('message') }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-8" id="logger">
                                    @if(count($errors) > 0)

                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li style="color:#ff0000; list-style: none"><i class="fa fa-exclamation"></i>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-ar btn-primary pull-right" id="send">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
		</div>

		<div class="tab-pane" id="buy-sms">
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

	    	<div class="absolute-center margin-top">
		        <div class="text-center">
		            <div class="transparent-div animated fadeInUp animation-delay-8" style="margin-top:120px;">

		                <p>To make cash payments, you can pay into any of the following accounts, with your username as the payers name. To confirm payments, fill out the form provided here.</p>
		                <ul class="bank-account-details">
		                	<li>0019968579- Arizechukwu Nzekwe (Access Bank)</li>
							<li>0039363098- Arizechukwu Nzekwe (Diamond Bank)</li>
							<li>0041958161- Arizechukwu Nzekwe (Union Bank)</li>
		                </ul>
                    @if($pricing)
		                <p><h2>A unit costs NGN {{ $pricing->unit_price }}</h2></p>
                    @else
                      <p><h2>A unit costs NGN 2.00</h2></p>
                    @endif
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
		</div>

		<div class="tab-pane" id="history">
		   <div class="col-lg-8">
		   @if($transactions && $transactions->count() > 0)
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
	                                <li><i class="fa fa-envelope-o"></i>{{ $repo->findTransactionMessages($transaction->id) }}</li>
	                                <li><i class="fa fa-phone"></i>{{ $transaction->receivers }}</li>
	                                <li><i class="fa fa-user"></i>{{ $transaction->user->name }}</li>
	                            </ul>
	                        </div>
	                        <div class="pricing-box-footer">
	                            <a href="{{ route('history.delete', $transaction->id) }}" class="btn btn-ar btn-default">Delete</a>
	                        </div>
	                    </div>
	                </div>
	            @endforeach
	         @else
	         	<div class="col-lg-offset-6 col-lg-6">
	         		<div class="alert alert-success text-center">
	         			<p>You have no history yet. Send messages to get some history</p>
	         		</div>
	         	</div>
	         @endif
		   </div>
		</div>
		<div class="tab-pane" id="schedule-messages">
			<div class="col-md-7 col-lg-offset-2">
	            <div class="panel panel-info-dark animated fadeInDown" style="margin-top: 70px;">
	                <div class="panel-heading">Schedule Messages</div>
	                <div class="panel-body">
	                  @if (session()->has('info'))
	                    <div class="alert-success text-center"><h2>{{ session()->get('info') }}</h2></div>
	                  @endif
	                    <form  method="post" id="message-form" action="{{ route('message.schedule')}}">
	                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
	                        <div class="form-group {{ $errors->has('numbers')? 'has-error': '' }}">
	                            <label for="InputPhoneNumbers">Receiver Phone Numbers(separated by commas)<sup>*</sup></label>
	                            <textarea name="numbers" placeholder="Receiver cell phone numbers... eg 07089898998,08097878667 ..."
	                            	id="inputPhoneNumbers" class="form-control" rows="5">{{Input::old('numbers')}}</textarea>
	                        </div>
	                        <div class="form-group {{ $errors->has('message')? 'has-error': '' }}">
	                            <label for="inputMessage">Message<sup>*</sup></label>
	                            <textarea id="inputMessage" class="form-control" name="message" placeholder="Text message here..." rows="5">{{ Input::old('message') }}</textarea>
	                        </div>
	                        <div class="form-group {{ $errors->has('date') ? 'has-error': '' }}">
	                          <div class="input-group">
	                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
	                            <input type="text" class="form-control" id="datepicker" name="date" value="{{ old('date') }}">
	                          </div>
	                        </div>
	                        <div class="form-group">
	                        	<div class="input-group">
	                        		<input type="submit" class="btn btn-primary" value="Schedule" id="schedule">
	                        	</div>
	                        </div>
	                    </form>
	                </div>
	            </div>
          </div>
		</div>
	</div>
@stop


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
                    <input type="text" class="form-control" placeholder="amount paid" name="amount" required="required">
                </div>

            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" id="make-payment">Confirm</button>
        </div>
    </div>
 </div>
</div> <!--- end Modal -->
