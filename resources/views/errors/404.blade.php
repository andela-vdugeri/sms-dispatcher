@extends('layouts.app')

@section('content')

    <!-- Preloader -->
    {{--<div id="preloader">--}}
        {{--<div id="status">&nbsp;</div>--}}
    {{--</div>--}}

    <div class="paper-back">
        <div class="absolute-center">
            <div class="text-center">
                <div class="title-logo animated fadeInDown animation-delay-5">Latter<span>Africa</span></div>
                <div class="transparent-div animated fadeInUp animation-delay-8">
                    <h1>Error 404</h1>
                    <h2>Page Not Found</h2>
                    <p>We have not found what you are looking for. <br> We have put our robots to search.</p>
                    <a href="{{ url('/') }}" class="btn btn-ar btn-primary btn-lg">Go Home</a>
                </div>
            </div>
        </div>
    </div>
@endsection
