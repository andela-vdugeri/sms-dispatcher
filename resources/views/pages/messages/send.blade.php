@extends('layouts.app')

@section('nav')
    @include('partials.nav')
@endsection

@section('content')
    <div class="container">
        <ul class="nav nav-tabs" style="margin-top: 70px;">
            <li role="presentation" class="active"><a href="{{ route('messages.page') }}">Send Messages</a></li>
            <li role="presentation"><a href="{{ route('messages.get.units') }}">Get Units</a></li>
            <li role="presentation"><a href="{{ route('messages.history') }}">History</a></li>
        </ul>

        <div class="row">
            <div class="col-md-7 col-lg-offset-2">

                <div class="panel panel-info-dark animated fadeInDown" style="margin-top: 70px;">
                    <div class="panel-heading">Send Messages</div>
                    <div class="panel-body">
                        <form action="#" method="post">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="form-group">
                                <label for="InputPhoneNumbers">Receiver Phone Numbers(separated by commas)<sup>*</sup></label>
                                <textarea name="numbers" placeholder="Receiver cell phone numbers... eg 07089898998,08097878667 ..." id="inputPhoneNumbers" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputMessage">Message<sup>*</sup></label>
                                <textarea id="inputMessage" class="form-control" name="message" placeholder="Text message here..." rows="5"></textarea>
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
                                    <button type="submit" class="btn btn-ar btn-primary pull-right" id="send-messages">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection