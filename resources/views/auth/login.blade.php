@extends('layouts.app')

@section('nav')
    @include('partials.nav')
@endsection

@section('content')
    <div class="container" style="margin: 170px 0 170px 0;">
        <div class="center-block logig-form">
            <div class="panel panel-primary">
                <div class="panel-heading">Login Form</div>
                <div class="panel-body">
                    <form role="form" method="post" action="{{ route('user.login') }}">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="form-group">
                            <div class="input-group login-input">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                            </div>
                            <br>
                            <div class="input-group login-input">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="checkbox_remember">
                                <label for="checkbox_remember">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-ar btn-primary pull-right">Login</button>
                            <a href="{{ route('social.login', 'twitter') }}" class="social-icon-ar sm twitter animated fadeInDown animation-delay-2"><i class="fa fa-twitter"></i></a>
                            <a href="#!" class="social-icon-ar sm google-plus animated fadeInDown animation-delay-3"><i class="fa fa-google-plus"></i></a>
                            <a href="{{ route('social.login', 'facebook') }}" class="social-icon-ar sm facebook animated fadeInDown animation-delay-4"><i class="fa fa-facebook"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- container  -->
@endsection


@section('footer')
    @include('partials.footer')
@endsection
