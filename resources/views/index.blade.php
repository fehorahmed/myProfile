<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>MeetMe Personal</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/lightbox/simpleLightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/nice-select/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate-css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flaticon/flaticon.css') }}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">



</head>

<body>

    <!--================Header Menu Area =================-->
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container box_1620">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.html"><img src="{{ asset('assets/img/logo.png') }}"
                            alt="This is Logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="about-us.html">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="services.html">Services</a></li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Pages</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link"
                                            href="portfolio.html">Portfolio</a></li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="elements.html">Elements</a></li>
                                </ul>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Blog</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                                    <li class="nav-item"><a class="nav-link" href="single-blog.html">Blog
                                            Details</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>


                            @if (Route::has('login') && Auth::check())
                                <li class="nav-item">
                                    <div class="top-right links">
                                        <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                                    </div>
                                </li>
                            @elseif (Route::has('login') && !Auth::check())


                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ url('/register') }}">Register</a></li>


                            @endif


                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->

    <!--================Home Banner Area =================-->
    <section class="home_banner_area">
        <div class="container box_1620">
            <div class="banner_inner d-flex align-items-center">
                <div class="banner_content">
                    <div class="media">
                        <div class="d-flex">
                            {{-- 668px*690px --}}
                            @if ($banner->isNotEmpty())
                                <img src="{{ asset('profilePic/' . $banner[0]->pic_name) }}"
                                    alt="This is my picture">
                            @else
                                <img src="{{ asset('assets/img/personal.jpg') }}" alt="This is my picture">
                            @endif

                        </div>
                        <div class="media-body">
                            <div class="personal_text">
                                <h6>Hello Everybody, i am</h6>
                                @if ($banner->isNotEmpty())
                                    <h3>{{ $banner[0]->name }}</h3>
                                    <h4>{{ $banner[0]->designation }}</h4>
                                    <p>{{ $banner[0]->details }}</p>
                                    <ul class="list basic_info">
                                        <li><a href="#"><i class="lnr lnr-calendar-full"></i>
                                                {{ $banner[0]->date }}</a></li>
                                        <li><a href="#"><i class="lnr lnr-phone-handset"></i>
                                                {{ $banner[0]->phone }}</a></li>
                                        <li><a href="#"><i class="lnr lnr-envelope"></i> {{ $banner[0]->email }}</a>
                                        </li>
                                        <li><a class="b-ancor" href="#"><i class="lnr lnr-home b-icon"></i>
                                                {{ $banner[0]->address }}</a></li>
                                    </ul>
                                    <ul class="list personal_social">
                                        @foreach ($social as $so)
                                        @if ($so->name=='facebook')
                                        <li><a href="{!!$so->link!!}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        @elseif ($so->name=='twitter')
                                        <li><a href="{!!$so->link!!}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        @elseif ($so->name=='linkedin')
                                        <li><a href="{!!$so->link!!}" target="_blank"><i class="fa fa-fw fa-linkedin-square"></i></a></li>
                                        @elseif ($so->name=='instagram')
                                        <li><a href="{!!$so->link!!}" target="_blank"><i class="fa fa-fw fa-instagram"></i></a></li>
                                        @endif

                                        @endforeach

                                    </ul>
                                @else
                                    <h3>Name Here</h3>
                                    <h4>Designation is here</h4>
                                    <p>Details here</p>
                                    <ul class="list basic_info">
                                        <li><a href="#"><i class="lnr lnr-calendar-full"></i> Date of Birth</a></li>
                                        <li><a href="#"><i class="lnr lnr-phone-handset"></i> Phone No.</a></li>
                                        <li><a href="#"><i class="lnr lnr-envelope"></i> Email</a></li>
                                        <li><a class="b-ancor" href="#"><i class="lnr lnr-home b-icon"></i>
                                                Address</a></li>
                                    </ul>
                                    <ul class="list personal_social">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Welcome Area =================-->
    <section class="welcome_area p_120">
        <div class="container">
            <div class="row welcome_inner">
                <div class="col-lg-6">
                    <div class="welcome_text">
                        @if ($about->isNotEmpty())
                            <h4>About Myself</h4>
                            <p>{{ $about[0]->about }}</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="wel_item">
                                        <i class="lnr lnr-database"></i>
                                        <h4>${{ $about[0]->donation }}</h4>
                                        <p>Total Donation</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="wel_item">
                                        <i class="lnr lnr-book"></i>
                                        <h4>{{ $about[0]->project }}</h4>
                                        <p>Total Projects</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="wel_item">
                                        <i class="lnr lnr-users"></i>
                                        <h4>{{ $about[0]->volunteers }}</h4>
                                        <p>Total Volunteers</p>
                                    </div>
                                </div>
                            </div>
                        @else
                            <h4>About Myself</h4>
                            <p>About will display here</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="wel_item">
                                        <i class="lnr lnr-database"></i>
                                        <h4>$50</h4>
                                        <p>Total Donation</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="wel_item">
                                        <i class="lnr lnr-book"></i>
                                        <h4>50</h4>
                                        <p>Total Projects</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="wel_item">
                                        <i class="lnr lnr-users"></i>
                                        <h4>50</h4>
                                        <p>Total Volunteers</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="tools_expert">
                        @if ($about->isNotEmpty())
                            <div class="skill_main">
                                <div class="skill_item">
                                    <h4>Web Design <span class="counter">{{ $about[0]->web_design }}</span>%
                                    </h4>
                                    <div class="progress_br">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar"
                                                aria-valuenow="{{ $about[0]->web_design }}" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="skill_item">
                                    <h4>Web Development <span
                                            class="counter">{{ $about[0]->web_development }}</span>%</h4>
                                    <div class="progress_br">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar"
                                                aria-valuenow="{{ $about[0]->web_development }}" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="skill_item">
                                    <h4>Laravel <span class="counter">{{ $about[0]->laravel }}</span>%</h4>
                                    <div class="progress_br">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar"
                                                aria-valuenow="{{ $about[0]->laravel }}" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="skill_item">
                                    <h4>Wordpress <span class="counter">{{ $about[0]->wordpress }}</span>%
                                    </h4>
                                    <div class="progress_br">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar"
                                                aria-valuenow="{{ $about[0]->wordpress }}" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="skill_item">
                                    <h4>Photoshop <span class="counter">{{ $about[0]->photoshop }}</span>%
                                    </h4>
                                    <div class="progress_br">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar"
                                                aria-valuenow="{{ $about[0]->photoshop }}" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="skill_main">
                                <div class="skill_item">
                                    <h4>Web Design <span class="counter">50</span>%</h4>
                                    <div class="progress_br">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="50"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="skill_item">
                                    <h4>Web Development <span class="counter">50</span>%</h4>
                                    <div class="progress_br">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="50"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="skill_item">
                                    <h4>Laravel <span class="counter">50</span>%</h4>
                                    <div class="progress_br">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="50"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="skill_item">
                                    <h4>Wordpress <span class="counter">50</span>%</h4>
                                    <div class="progress_br">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="50"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="skill_item">
                                    <h4>Photoshop <span class="counter">50</span>%</h4>
                                    <div class="progress_br">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="50"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Welcome Area =================-->

    <!--================My Tabs Area =================-->
    <section class="mytabs_area p_120">
        <div class="container">
            <div class="tabs_inner">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">My Experiences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">My Education</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        @if ($experience->isNotEmpty())
                            <ul class="list">
                                @foreach ($experience as $exp)
                                    <li>
                                        <span></span>
                                        <div class="media">
                                            <div class="d-flex">
                                                <p class="list-p">{{ $exp->start_date }} to
                                                    @if ($exp->end_date != null)
                                                        {{ $exp->end_date }}
                                                    @else
                                                        Present
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="media-body exp-custom">
                                                <h4>{{ $exp->company_name }}</h4>
                                                <p>{{ $exp->designation }}
                                                    <br />
                                                    {{ $exp->address }}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <ul class="list">
                                <li>
                                    <span></span>
                                    <div class="media">
                                        <div class="d-flex">
                                            <p>Start date to end date here</p>
                                        </div>
                                        <div class="media-body">
                                            <h4>Experience Here</h4>
                                            <p>Senior Web Developer <br />Santa monica, Los angeles</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <span></span>
                                    <div class="media">
                                        <div class="d-flex">
                                            <p>Start date to end date here</p>
                                        </div>
                                        <div class="media-body">
                                            <h4>Experience Here</h4>
                                            <p>Senior Web Developer <br />Santa monica, Los angeles</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <span></span>
                                    <div class="media">
                                        <div class="d-flex">
                                            <p>Start date to end date here</p>
                                        </div>
                                        <div class="media-body">
                                            <h4>Experience Here</h4>
                                            <p>Senior Web Developer <br />Santa monica, Los angeles</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endif

                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        @if ($education->isNotEmpty())
                            <ul class="list">
                                @foreach ($education as $edu)


                                    <li>
                                        <span></span>
                                        <div class="media">
                                            <div class="d-flex">
                                                <p class="list-p">{{ $edu->start_date }} to
                                                    @if ($edu->end_date != null)
                                                        {{ $edu->end_date }}
                                                    @else
                                                        Present
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="media-body">
                                                <h4>{{ $edu->exam }}</h4>
                                                <p>{{ $edu->college }} <br />Result: {{ $edu->result }}</p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <ul class="list">
                                <li>
                                    <span></span>
                                    <div class="media">
                                        <div class="d-flex">
                                            <p>March 2017 to present</p>
                                        </div>
                                        <div class="media-body">
                                            <h4>2nd</h4>
                                            <p>Senior Web Developer <br />Santa monica, Los angeles</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <span></span>
                                    <div class="media">
                                        <div class="d-flex">
                                            <p>March 2017 to present</p>
                                        </div>
                                        <div class="media-body">
                                            <h4>Colorlib</h4>
                                            <p>Senior Web Developer <br />Santa monica, Los angeles</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <span></span>
                                    <div class="media">
                                        <div class="d-flex">
                                            <p>March 2017 to present</p>
                                        </div>
                                        <div class="media-body">
                                            <h4>Colorlib</h4>
                                            <p>Senior Web Developer <br />Santa monica, Los angeles</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End My Tabs Area =================-->

    <!--================Feature Area =================-->
    <section class="feature_area p_120">
        <div class="container">
            <div class="main_title">
                <h2>offerings to my clients</h2>
                <p>If you are looking at blank cassettes on the web, you may be very confused at the difference in
                    price. You may see some for as low as $.17 each.</p>
            </div>
            <div class="feature_inner row">
                @if ($service->isNotEmpty())
                    @foreach ($service as $ser)


                        <div class="col-lg-4 col-md-6">
                            <div class="feature_item">
                                <img class="f-img" src="{{ asset('servicePic/' . $ser->file) }}" width="80"
                                    alt="">
                                {{-- <i class="flaticon-city"></i> --}}
                                <h4>{{ $ser->service }}</h4>
                                <p>{{ $ser->details }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-4 col-md-6">
                        <div class="feature_item">
                            <img class="f-img" src="{{ asset('assets/img/personal.jpg') }}" width="80"
                                alt="">
                            {{-- <i class="flaticon-city"></i> --}}
                            <h4>Architecture</h4>
                            <p>If you are looking at blank cassettes on the web, you may be very confused at the
                                difference
                                in price. You may see some for as low as $17 each.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="feature_item">
                            <i class="flaticon-skyline"></i>
                            <h4>Interior Design</h4>
                            <p>If you are looking at blank cassettes on the web, you may be very confused at the
                                difference
                                in price. You may see some for as low as $17 each.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="feature_item">
                            <i class="flaticon-sketch"></i>
                            <h4>Concept Design</h4>
                            <p>If you are looking at blank cassettes on the web, you may be very confused at the
                                difference
                                in price. You may see some for as low as $17 each.</p>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>
    <!--================End Feature Area =================-->

    <!--================Home Gallery Area =================-->
    <section class="home_gallery_area p_120">
        <div class="container">
            <div class="main_title">
                <h2>My Latest Featured Projects</h2>
                <p>Who are in extremely love with eco friendly system.</p>
            </div>
            {{-- <div class="isotope_fillter">
                <ul class="gallery_filter list">
                    <li class="active" data-filter="*"><a href="#">All</a></li>
                    <li data-filter=".brand"><a href="#">Vector</a></li>
                    <li data-filter=".manipul"><a href="#">Raster</a></li>
                    <li data-filter=".creative"><a href="#">UI/UX</a></li>
                    <li data-filter=".design"><a href="#">Printing</a></li>
                </ul>
            </div> --}}
        </div>
        <div class="container">
            @if ($project->isNotEmpty())
                <div class="gallery_f_inner row imageGallery1">
                    @foreach ($project as $pro)
                        <div class="col-lg-4 col-md-4 col-sm-6 brand manipul {{ $pro->group_name }} print">
                            <div class="h_gallery_item">
                                <div class="g_img_item">
                                    <img class="img-fluid" src="{{ asset('projectPic/' . $pro->file) }}"
                                        alt="Projects Picture">
                                    <a class="light" target="_blank" href="{{ $pro->link }}"><img
                                            src="{{ asset('assets/img/icon.png') }}" alt=""></a>
                                </div>
                                <div class="g_item_text">
                                    <h4>{{ $pro->name }}</h4>
                                    <p>{{ $pro->about }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            @else
                <div class="gallery_f_inner row imageGallery1">

                    <div class="col-lg-4 col-md-4 col-sm-6 brand manipul design print">
                        <div class="h_gallery_item">
                            <div class="g_img_item">
                                <img class="img-fluid" src="img/gallery/project-1.jpg" alt="Projects Picture">
                                <a class="light" href="img/gallery/project-1.jpg"><img
                                        src="img/gallery/icon.png" alt=""></a>
                            </div>
                            <div class="g_item_text">
                                <h4>3D Helmet Design</h4>
                                <p>Client Project</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 brand manipul creative">
                        <div class="h_gallery_item">
                            <div class="g_img_item">
                                <img class="img-fluid" src="img/gallery/project-2.jpg" alt="Projects Picture">
                                <a class="light" href="img/gallery/project-2.jpg"><img
                                        src="img/gallery/icon.png" alt="Projects Icon"></a>
                            </div>
                            <div class="g_item_text">
                                <h4>2D Vinyl Design</h4>
                                <p>Client Project</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 manipul creative design print">
                        <div class="h_gallery_item">
                            <div class="g_img_item">
                                <img class="img-fluid" src="img/gallery/project-3.jpg" alt="Projects Picture">
                                <a class="light" href="img/gallery/project-3.jpg"><img
                                        src="img/gallery/icon.png" alt=""></a>
                            </div>
                            <div class="g_item_text">
                                <h4>Creative Poster Design</h4>
                                <p>Client Project</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 brand creative print">
                        <div class="h_gallery_item">
                            <div class="g_img_item">
                                <img class="img-fluid" src="img/gallery/project-4.jpg" alt="Projects Picture">
                                <a class="light" href="img/gallery/project-4.jpg"><img
                                        src="img/gallery/icon.png" alt=""></a>
                            </div>
                            <div class="g_item_text">
                                <h4>Embosed Logo Design</h4>
                                <p>Client Project</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 brand manipul design">
                        <div class="h_gallery_item">
                            <div class="g_img_item">
                                <img class="img-fluid" src="img/gallery/project-5.jpg" alt="Projects Picture">
                                <a class="light" href="img/gallery/project-5.jpg"><img
                                        src="img/gallery/icon.png" alt=""></a>
                            </div>
                            <div class="g_item_text">
                                <h4>3D Disposable Bottle</h4>
                                <p>Client Project</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 brand creative">
                        <div class="h_gallery_item">
                            <div class="g_img_item">
                                <img class="img-fluid" src="img/gallery/project-6.jpg" alt="Projects Picture">
                                <a class="light" href="img/gallery/project-6.jpg"><img
                                        src="img/gallery/icon.png" alt=""></a>
                            </div>
                            <div class="g_item_text">
                                <h4>3D Logo Design</h4>
                                <p>Client Project</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="more_btn">
                <a class="main_btn" href="#">Load More Items</a>
            </div>
        </div>
    </section>
    <!--================End Home Gallery Area =================-->

    <!--================Testimonials Area =================-->
    {{-- <section class="testimonials_area p_120">
        <div class="container">
            <div class="main_title">
                <h2>Testimonials</h2>
                <p>If you are looking at blank cassettes on the web, you may be very confused at the difference in
                    price. You may see some for as low as $.17 each.</p>
            </div>
            <div class="testi_inner">
                <div class="testi_slider owl-carousel">
                    <div class="item">
                        <div class="testi_item">
                            <p>As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth.
                                If you think about it, you travel across her face</p>
                            <h4>Fanny Spencer</h4>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star-half-o"></i></a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testi_item">
                            <p>As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth.
                                If you think about it, you travel across her face</p>
                            <h4>Fanny Spencer</h4>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star-half-o"></i></a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testi_item">
                            <p>As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth.
                                If you think about it, you travel across her face</p>
                            <h4>Fanny Spencer</h4>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star-half-o"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--================End Testimonials Area =================-->

    <!--================Contact Area =================-->
    <section class="contact_area p_120">
        <div class="container">
            <div class="main_title">
                <h2>Send message</h2>
                <p>Who are in extremely love with eco friendly system.</p>
                @if (session('message'))

                   <h3>{{ session('message') }}</h3>

                @endif
            </div>
            <div class="row">
                <div class="col-lg-3">
                    @if ($banner->isNotEmpty())
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>{{ $banner[0]->address }}</h6>
                            <p></p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6><a href="#"></a>{{ $banner[0]->phone }}</h6>
                            <p>Mon to Fri 9am to 6 pm</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6><a href="#">{{ $banner[0]->email }}</a></h6>
                            <p>Send me your query anytime!</p>
                        </div>
                    </div>
                    @else
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>Address Here</h6>
                            <p>Santa monica bullevard</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6><a href="#"></a>Phone no here</h6>
                            <p>Mon to Fri 9am to 6 pm</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6><a href="#">email here</a></h6>
                            <p>Send me your query anytime!</p>
                        </div>
                    </div>
                    @endif

                </div>
                <div class="col-lg-9">
                    <form class="row contact_form" action="{{ route('admin.message.store') }}" method="post"
                        id="contactForm" novalidate="novalidate">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter your name">
                            </div>
                            @error('name')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter email address">
                            </div>
                            @error('email')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject"
                                    placeholder="Enter Subject">
                            </div>
                            @error('subject')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" rows="1"
                                    placeholder="Enter Message"></textarea>
                            </div>
                            @error('message')
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="btn submit_btn">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--================Contact Area =================-->

    <!--================Footer Area =================-->
    <footer class="footer_area p_120">
        <div class="container">
            <div class="row footer_inner">
                <div class="col-lg-5 col-sm-6">
                    <aside class="f_widget ab_widget">
                        <div class="f_title">
                            <h3>About Me</h3>
                        </div>
                        <p>Do you want to be even more successful? Learn to love learning and growth. The more effort
                            you put into improving your skills,</p>
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is developed by <i class="fa fa-heart-o"
                                aria-hidden="true"></i> by <a href="https://fehor.idbdev.com" target="_blank">Fehor Ahmed</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </aside>
                </div>
                <div class="col-lg-5 col-sm-6">
                    <aside class="f_widget news_widget">
                        <div class="f_title">
                            <h3>Newsletter</h3>
                        </div>
                        <p>Stay updated with our latest trends</p>
                        <div id="mc_embed_signup">
                            <form target="_blank"
                                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                method="get" class="subscribe_form relative">
                                <div class="input-group d-flex flex-row">
                                    <input name="EMAIL" placeholder="Enter email address"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '"
                                        required="" type="email">
                                    <button class="btn sub-btn"><span class="lnr lnr-arrow-right"></span></button>
                                </div>
                                <div class="mt-10 info"></div>
                            </form>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-2">
                    <aside class="f_widget social_widget">
                        <div class="f_title">
                            <h3>Follow Me</h3>
                        </div>
                        <p>Let us be social</p>
                        <ul class="list">
                            @foreach ($social as $so)
                            @if ($so->name=='facebook')
                            <li><a href="{!!$so->link!!}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            @elseif ($so->name=='twitter')
                            <li><a href="{!!$so->link!!}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            @elseif ($so->name=='linkedin')
                            <li><a href="{!!$so->link!!}" target="_blank"><i class="fa fa-fw fa-linkedin-square"></i></a></li>
                            @endif

                            @endforeach

                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </footer>
    <!--================End Footer Area =================-->






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/stellar.js') }}"></script>
    <script src="{{ asset('assets/vendors/lightbox/simpleLightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/mail-script.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    {{-- <!--gmaps Js-->
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
     <script src="{{ asset('assets/js/gmaps.min.js') }}"></script>
     <script src="{{ asset('assets/js/theme.js') }}"></script> --}}
</body>

</html>
