@extends('layouts.app')

@section('nav')
	@include('partials.nav')
@endsection

@section('content')
	<div class="paper-back">
		<ul class="nav nav-tabs">
            <li role="presentation"><a href="{{ route('messages.page') }}">Send Messages</a></li>
            <li role="presentation"><a href="{{ route('messages.get.units') }}">Buy SMS</a></li>
            <li role="presentation"><a href="{{ route('messages.history') }}">History</a></li>
            <li role="presentation" class="active"><a href="{{ route('schedule.loadPage') }}">Shedule SMS</a></li>
        </ul>

         <div class="tab-content margin-top">
             <div class="tab-pane">
                 
             </div>
             <div class="tab-pane">
                 
             </div>
             <div class="tab-pane">
                 
             </div>
        </div>

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
                            <textarea name="numbers" placeholder="Receiver cell phone numbers... eg 07089898998,08097878667 ..." id="inputPhoneNumbers" class="form-control" rows="5">{{Input::old('numbers')}}</textarea>
                        </div>
                        <div class="form-group {{ $errors->has('message')? 'has-error': '' }}">
                            <label for="inputMessage">Message<sup>*</sup></label>
                            <textarea id="inputMessage" class="form-control" name="message" placeholder="Text message here..." rows="5">{{ Input::old('message') }}</textarea>
                        </div>
                        <div class="form-group {{ $errors->has('date') ? 'has-error': '' }}">
                          <div class="input-group">
                            <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control" id="datepicker" name="date" value="{{ old('date') }}">
                          </div>
                        </div>
    						
    					</div>
                        <div class="row">
                            <div class="col-md-8" id="logger">
                                @if(count($errors) > 0)

                                    <ul>
                                        @foreach($errors->all() as $error)
                                            {{--<li style="color:#ff0000; list-style: none"><i class="fa fa-exclamation"></i>{{ $error }}</li>--}}
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-ar btn-primary pull-right">Schedule</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
	</div>
@endsection