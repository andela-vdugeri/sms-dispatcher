@extends('layouts.app')

@section('nav')
    @include('partials.nav')
@endsection

@section('content')
    <div class="container">
        <ul class="nav nav-tabs" style="margin-top: 70px;">
            <li role="presentation" class="active"><a href="{{ route('messages.page') }}">Send Messages</a></li>
            <li role="presentation"><a href="{{ route('messages.get.units') }}">Get Units</a></li>
            <li role="presentation"><a href="#">History</a></li>
        </ul>
    </div>

@endsection