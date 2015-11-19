@extends('layouts.app')

@section('nav')
    @include('partials.nav')
@endsection

@section('content')

    <div class="container"style="margin: 70px">
        <div class="row">
            <div class="col-md-12">
                <div class="title-logo animated fadeInDown animation-delay-5">Latter<span>Africa</span></div>
            </div>
            <div class="col-md-7">
                <h2 class="right-line">About us</h2>
                <p>We offer sophisticated messaging services which includes "VOICE AND SMS"which covers professional SMS messaging for authentication, alerting and marketing. Validate mobile numbers and interact via SMS and USSD among many others. These are; customized sms, 2-way SMS messaging, file2sms, text2speech, etc
                </p>
                <p>Understanding that the small business of today is the global champion tomorrow. And also that the future belongs to those who aspire. We are positioned by commission and practice to be the spring board for the lofty leap of small/emerging businesses (SMEs). Part of these are the reasons why we focusing on building and growing with you.</p>
                <p>Our Cooperation promises nothing short of astounding accomplishment of our dreams and vision. Our goal, pride and achievement is in seeing you through the accomplishments of your great goals dreams and achievements.</p>
            </div>
            <div class="col-md-5">
                <h2 class="right-line">Our Approach</h2>
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading panel-heading-link">
                            <a data-toggle="collapse" data-parent="#accordion" href="page_about2.html#collapseOne">
                                <i class="fa fa-lightbulb-o"></i> Talent and creativity
                            </a>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <p>Our team of seasoned personnel have much more than massive experience to combat your challenges, and discern the coordinates and further navigations.</p>
                                <p>We offer you professional advice concerning your business growth opportunities, risk avoidance and management, and breaks where you can cash in for continuous growth and development.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading panel-heading-link">
                            <a data-toggle="collapse" data-parent="#accordion" href="page_about2.html#collapseTwo" class="collapsed">
                                <i class="fa fa-desktop"></i> Negotiations and Liaison
                            </a>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>We also boast of seasoned negotiations and liaising personnel who will give you a cutting edge and top notch services in your negotiations/liaison deals,
                                    whether it be business deals or whatever transactions, including merger and acquisitions.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading panel-heading-link">
                            <a data-toggle="collapse" data-parent="#accordion" href="page_about2.html#collapseThree" class="collapsed">
                                <i class="fa fa-user"></i> Public Relations
                            </a>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Our Public Relations aim here is to achieve the best results for our client, impacting the brand as well as the bottom line.  We have extensive experience in creating memorable PR campaigns for emerging and established brands.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h2 class="right-line">What do we do?</h2>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="text-icon">
                    <span class="icon-ar icon-ar-lg"><i class="fa fa-envelope"></i></span>
                    <div class="text-icon-content">
                        <h3 class="no-margin">SMS Services</h3>
                        <p>We offer sophisticated messaging services, professional SMS messaging for authentication, alerting and marketing</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="text-icon">
                    <span class="icon-ar icon-ar-lg"><i class="fa fa-desktop"></i></span>
                    <div class="text-icon-content">
                        <h3 class="no-margin">Business Development</h3>
                        <p> Our goal, pride and achievement is in seeing you through the accomplishments of your great goals.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="text-icon">
                    <span class="icon-ar icon-ar-lg"><i class="fa fa-question-circle"></i></span>
                    <div class="text-icon-content">
                        <h3 class="no-margin">Advisory Services</h3>
                        <p>Our team of seasoned personnel have much more than massive experience to combat your challenges, and discern the coordinates and further navigations.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="text-icon">
                    <span class="icon-ar icon-ar-lg"><i class="fa fa-group"></i></span>
                    <div class="text-icon-content">
                        <h3 class="no-margin">Public Relations</h3>
                        <p> We have extensive experience in creating memorable PR campaigns for emerging and established brands.</p>
                    </div>
                </div>
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
@endsection

@section('footer')
    @include('partials.footer')
@endsection