@extends('layouts.app')

@section('nav')
    @include('partials.nav')
@endsection


@section('content')

<div class="container">
<div class="row">
    <div class="col-md-7 col-lg-offset-2">
        <h2 class="section-title no-margin-top">Create Account</h2>
        <div class="panel panel-info-dark animated fadeInDown">
            <div class="panel-heading">Register Form</div>
            <div class="panel-body">
                <form action="{{ route('user.register') }}" method="post">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group">
                        <label for="InputUserName">User Name<sup>*</sup></label>
                        <input type="text" class="form-control" id="InputUserName" name="name" required="">
                    </div>
                    <div class="form-group">
                        <label for="InputEmail">Email<sup>*</sup></label>
                        <input type="email" class="form-control" name="email" required=""id="InputEmail">
                    </div>
                    <div class="form-group">
                        <label for="InputPassword">Password<sup>*</sup></label>
                        <input type="password" class="form-control" name="password" id="InputPassword" required="">
                    </div>
                    <div class="form-group">
                        <label for="InputConfirmPassword">Confirm Password<sup>*</sup></label>
                        <input type="password" class="form-control" id="inputConfirmPassword" name="password_confirmation" required="">
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            @if(count($errors) > 0)

                                <ul>
                                @foreach($errors->all() as $error)
                                    <li style="color:#ff0000; list-style: none"><i class="fa fa-exclamation"></i>{{ $error }}</li>
                                @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-ar btn-primary pull-right">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div> <!-- container  -->
@endsection