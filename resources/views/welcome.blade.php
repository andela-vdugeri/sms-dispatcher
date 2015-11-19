@extends('layouts.app')

@section('nav')
    @include('partials.nav')
@endsection


@section('content')
    <section class="carousel-section">
        <div id="carousel-example-generic" class="carousel carousel-razon slide" data-ride="carousel" data-interval="5000">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-7">
                                <div class="carousel-caption">
                                    <div class="carousel-text">
                                        <h1 class="animated fadeInDownBig animation-delay-7 carousel-title">&nbsp;</h1>
                                        <h2 class="animated fadeInDownBig animation-delay-5  crousel-subtitle">We give you everything done, except the coffee</h2>
                                        <ul class="list-unstyled carousel-list">
                                            <li class="animated bounceInLeft animation-delay-11"><i class="fa fa-check"></i>Brand Management, Research and Development</li>
                                            <li class="animated bounceInLeft animation-delay-13"><i class="fa fa-check"></i>Sophisticated Messaging Services</li>
                                            <li class="animated bounceInLeft animation-delay-15"><i class="fa fa-check"></i>Focused on building and growing with you</li>
                                        </ul>
                                        {{--<p class="animated fadeInUpBig animation-delay-17">Lorem ipsum dolor sit amet consectetur adipisicing elit. In rerum maxime quis tenetur dolor <span>recusandae a nulla</span> qui enim dolorem.</p>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-5 hidden-xs carousel-img-wrap">
                                <div class="carousel-img">
                                    <img src="{!! asset('img/demo/pre.png') !!}" class="img-responsive animated bounceInUp animation-delay-3" alt="Image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-8">
                                <div class="carousel-caption">
                                    <div class="carousel-text">
                                        <h1 class="animated fadeInDownBig animation-delay-7 carousel-title">&nbsp;</h1>
                                        <h2 class="animated fadeInDownBig animation-delay-5  crousel-subtitle">Configure your own sms profile in few easy steps</h2>
                                        <ul class="list-unstyled carousel-list">
                                            <li class="animated bounceInLeft animation-delay-11"><i class="fa fa-check"></i>Our Pride and Achievement is in seeing you through</li>
                                            <li class="animated bounceInLeft animation-delay-13"><i class="fa fa-check"></i>A team of seasoned personnel</li>
                                            <li class="animated bounceInLeft animation-delay-15"><i class="fa fa-check"></i>Trust us and we take you through.</li>
                                        </ul>
                                        {{--<p class="animated fadeInUpBig animation-delay-17">Lorem ipsum dolor sit amet consectetur adipisicing elit. In rerum maxime quis tenetur dolor <span>recusandae a nulla</span> qui enim dolorem.</p>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-4 hidden-xs carousel-img-wrap">
                                <div class="carousel-img">
                                    <img src="{!! asset('img/demo/pre2.png') !!}" class="img-responsive animated bounceInUp animation-delay-3" alt="Image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-7 col-sm-9">
                                <div class="carousel-caption">
                                    <div class="carousel-text">
                                        <h1 class="animated fadeInDownBig animation-delay-7 carousel-title">&nbsp;</h1>
                                        <h2 class="animated fadeInDownBig animation-delay-5  crousel-subtitle">Simple sms offers you instant delivery sms to all networks, no worries.</h2>
                                        <ul class="list-unstyled carousel-list">
                                            <li class="animated bounceInLeft animation-delay-11"><i class="fa fa-check"></i>Expert Business Development Consulting</li>
                                            <li class="animated bounceInLeft animation-delay-13"><i class="fa fa-check"></i>Expert Strategy Formulation</li>
                                            <li class="animated bounceInLeft animation-delay-15"><i class="fa fa-check"></i>Expert System Building</li>
                                        </ul>
                                        <p class="animated fadeInUpBig animation-delay-17">Lorem ipsum dolor sit amet consectetur adipisicing elit. In rerum maxime quis tenetur dolor <span>recusandae a nulla</span> qui enim dolorem.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-5 col-sm-3 hidden-xs carousel-img-wrap">
                                <div class="carousel-img">
                                    <img src="{!! asset('img/demo/pre3.png') !!}" class="img-responsive animated bounceInUp animation-delay-3" alt="Image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="index.html#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="index.html#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </section> <!-- carousel -->

    <section class="margin-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="content-box box-default animated fadeInUp animation-delay-10">
                        <span class="icon-ar icon-ar-lg icon-ar-round icon-ar-inverse"><i class="fa fa-envelope"></i></span>
                        <h4 class="content-box-title">Sophisticated Messaging</h4>
                        <p>We offer sophisticated messaging services which includes voice and sms,which covers professional SMS messaging for authentication, alerting and marketing.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="content-box box-default animated fadeInUp animation-delay-14">
                        <span class="icon-ar icon-ar-lg icon-ar-round icon-ar-inverse"><i class="fa fa-map"></i></span>
                        <h4 class="content-box-title">Bridge builders</h4>
                        <p>We are the bridge and linkage between where you are in the business today and your dream business destination. We are familiar with the rough and uneasy terrain in between, trust us and we take you through.
                        </p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="content-box box-default animated fadeInUp animation-delay-16">
                        <span class="icon-ar icon-ar-lg icon-ar-round icon-ar-inverse"><i class="fa fa-star"></i></span>
                        <h4 class="content-box-title">Outstanding Services</h4>
                        <p>Our team of seasoned personnel have much more than massive experience to combat your challenges, and discern the coordinates and further navigation. We offer you professional advice concerning your business.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="content-box box-default animated fadeInUp animation-delay-12">
                        <span class="icon-ar icon-ar-lg icon-ar-round icon-ar-inverse"><i class="fa fa-flag"></i></span>
                        <h4 class="content-box-title">We believe in you</h4>
                        <p>Understanding that the small business of today is the global champion tomorrow. And also that the future belongs to those who aspire. We are positioned by commission and practice to be the spring board for the lofty leap of small/emerging businesses (SMEs).</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    @include('partials.footer')
@endsection