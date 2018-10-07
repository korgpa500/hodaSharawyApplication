<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.fullName' ,'Houda Sharawy Language School')}}</title>

    <!--script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/myJs.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link href="{{ asset('css/gallery-grid.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- icon -->
    <link rel="icon" href="{{asset('images/logot.png')}}">
</head>
<body>

<!--navbar-->
<nav class="navbar navbar-expand-md navbar-dark fixed-top myNavBar">
    <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'H.SH.L.S') }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
            <li><a class="nav-link" href="/eventsShow" id="itemsLink">{{ __('News') }}</a></li>
            <li><a class="nav-link" href="/photos" id="itemsLink">{{ __('Gallery') }}</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ __('Sections') }}
                </a>
                <div class="dropdown-menu myColorBg" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/kg">K.G</a>
                    <a class="dropdown-item" href="/junior">Junior</a>
                    <a class="dropdown-item" href="/middle">Middle</a>
                    <a class="dropdown-item" href="/senior">Senior</a>
                </div>
            </li>
            <li><a class="nav-link" href="/blog" id="itemsLink">{{ __('Posts') }}</a></li>
        </ul>
        <!-- Right Side Of NavBar -->
        <ul class="navbar-nav ml-auto">
            @if (Route::has('login'))
                @auth
                <li><a class="nav-link" id="itemsLink" href="{{ url('/home') }}">Home</a></li>
            @else
                <li><a class="nav-link" id="itemsLink" href="{{ route('login') }}">Login</a></li>
                {{--<li><a class="nav-link" id="itemsLink" href="{{ route('register') }}">Register</a></li>--}}
                <li><a class="nav-link" id="itemsLink" href="{{ url('/users/register') }}">Register</a></li>
                @endauth
            @endif
        </ul>
    </div>
</nav>
<div class="row justify-content-center">
    <div class="logoBackGround mx-auto col-12 text-center">
        <img src="{{asset('images/logot.png')}}" class="img-fluid">
    </div>
</div>
<br><br>
<!-- carousel -->
<div id="carouselExampleFade" class="carousel slide carousel-fade myCarousel" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{asset('images/pic1.png')}}" alt="First slide">
            <div class="carousel-caption">
                <img src="{{asset('images/logot.png')}}" class="logoOnCarsouel">
                <!--<h1>Houda Sharawy Language Schools</h1>-->
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('images/pic2.png')}}" alt="Second slide">
            <div class="carousel-caption">
                <img src="{{asset('images/logot.png')}}" class="logoOnCarsouel">
                <!--<h1>Houda Sharawy Language Schools</h1>-->
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('images/pic4.png')}}" alt="Third slide">
            <div class="carousel-caption">
                <img src="{{asset('images/logot.png')}}" class="logoOnCarsouel">
                <!--<h1>Houda Sharawy Language Schools</h1>-->
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<!-- Sections-->
<div id="Sections" class="text-center container">
    <h1 class="textTitleY">Houda Sharawy Language School</h1>
    <div class="row justify-content-center">
        <div class="col-sm-6 col-md-6 col-lg-2 col-xs-6">
            <a href="/kg">
                <button class="btnStage animated infinite pulse" id="kg">K.G</button>
            </a>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-2 col-xs-6">
            <a href="/junior">
                <button class="btnStage animated infinite pulse" id="ps">Junior</button>
            </a>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-2 col-xs-6">
            <a href="/middle">
                <button class="btnStage animated infinite pulse" id="mg">Middle</button>
            </a>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-2 col-xs-6">
            <a href="/senior">
                <button class="btnStage animated infinite pulse" id="sg">Senior</button>
            </a>
        </div>
    </div>
</div>
<!-- End Sections-->

<!-- Bout US -->
<div id="aboutus" class="text-center containerY">
    <h1 class="textTitleY">About School</h1>
    <h4>The school was named after the most prominent Egyptian women activists who formed the history of women's<br>
        movement in Egypt in the late 19th and mid-20th centuries.</h4>
    <div class="tz-gallery">
        <div class="row">
            <div class='col-sm-3 col-md-3 col-xs-3 mx-auto'>
                <a class='lightbox' href='{{asset('images/hs.jpg')}}'>
                    <img src="{{asset('images/hs.jpg')}}" alt='Houda Sharawy'>
                </a>
                <h4 class="font-weight-bold">Houda Sharawy</h4>
            </div>
        </div>
    </div>


    <script>baguetteBox.run('.tz-gallery');</script>

</div>
<!-- End About Us -->

<!-- TOUR -->
<div id="tour">
    <div class="container">
        <h1 class="textTitleY text-center">Vision And Message</h1>
        <br>
        <h2 class="textTitleY text-center">Our Vision</h2>
        <h4>
            <ul>
                <li>To raise a positive generation committed to his country and copping with changes of the age within a
                    suitable education climate
                </li>
            </ul>
        </h4>
        <br>
        <h2 class="textTitleY text-center">Our Message</h2>
        <h4>
            <ul>
                <li>To use modern education methods.</li>
                <li>To enhance thhoe role of social participation.</li>
                <li>To develop students' sense of democracy and argument so that they may be able to create and
                    innovate.
                </li>
                <li>To widen students' knowledge and improve their skills.</li>
                <li>To promote teachers' ongoing development and self-assessment.</li>
                <li>To cooperate and work in team.</li>
            </ul>
        </h4>

    </div>
</div>
<!-- END TOUR -->

<!-- Contact -->
<div id="contact" class="text-center container-fluid">
    <h1 class="textTitleY">Contact Us</h1>
    <br><br>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6">
            <h5>We will be happy with your suggestions and opinions</h5>
            <h5>Pleases fill This Fields</h5>
            <form action="/suggestions" method="post">
                @csrf
                <div class="form-group">
                    <label class="font-weight-bold">Select Section</label>
                    <select name="section_name" class="form-control" id="youssry">
                        <option value="general">General</option>
                        @foreach($sections as $section)
                            <option value="{{$section->section_name}}">{{$section->section_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    {{--<label class="font-weight-bold">Title :</label>--}}
                    <input type="text" name="title" placeholder="title" id="youssry"
                           class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                           value="{{old('title')}}" required>
                </div>
                <div class="form-group">
                    {{--<label class="font-weight-bold">Name :</label>--}}
                    <input type="text" name="sender_name" placeholder="Your Name" id="youssry"
                           class="form-control{{ $errors->has('sender_name') ? ' is-invalid' : '' }}"
                           value="{{old('sender_name')}}" required>
                </div>
                <div class="form-group">
                    {{--<label class="font-weight-bold">E-mail :</label>--}}
                    <input type="text" name="sender_email" placeholder="Your E-mail" id="youssry"
                           class="form-control{{ $errors->has('sender_email') ? ' is-invalid' : '' }}"
                           value="{{old('sender_email')}}" required>
                </div>
                <div class="form-group">
                    {{--<label class="font-weight-bold">Message :</label>--}}
                    <textarea class="form-control textareaY{{ $errors->has('sender_message') ? ' is-invalid' : '' }}"
                              rows="5" placeholder="Your Message......"
                              name="sender_message">{{old('sender_message')}}</textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="Send" class="btn btn-danger btnYoussry">
                </div>
            </form>

        </div>
        <div class="col-sm-12 col-md-12 col-lg-6">
            <!-- Add Google Maps -->
            <div id="googleMap"></div>
            <script>
                function myMap() {
                    var myCenter = new google.maps.LatLng(31.221865, 29.947945);
                    var mapProp = {
                        center: myCenter,
                        zoom: 19,
                        scrollwheel: false,
                        draggable: false,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
                    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
                    var marker = new google.maps.Marker({position: myCenter});
                    marker.setMap(map);
                }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA969mxX2sK9WNAP5BSxNkP7IQLsuO5p4Q&callback=myMap"></script>
            <!-- End Google Maps -->
        </div>
    </div>
    <br><br>
    <!-- End Contact -->

@if($errors)
    <!-- Modal Error Message-->
        <div class="modal fade" id="MsgError" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-danger">Warning......</h4>
                    </div>
                    <div class="modal-body">
                        <label class="text-danger active textWarning">
                            @foreach($errors->all() as $error)
                                <script type='text/javascript'>
                                    $(document).ready(function () {
                                        $('#MsgError').modal('show');
                                    });
                                </script>

                                {{$error}} <br>
                            @endforeach
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button id="btnClose" type="button" class="btn btn-danger btnYoussry" data-dismiss="modal">Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Error-->
@endif

@if(session()->has('message'))
    <!-- Modal Sent Message-->
        <div class="modal fade" id="MsgSent" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-success">Success.....</h4>
                    </div>
                    <div class="modal-body">
                        <label class="text-success active textWarning">
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('#MsgSent').modal('show');
                                });
                            </script>
                            Thank you, your message has ben sent.
                            <br>
                            As soon as we will reply to your message
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btnYoussry" data-dismiss="modal">Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Sent-->

    @endif

</div>


<!-- Footer -->
<footer class="page-footer font-small myColorBg text-light lighten-3 pt-4 mt-4">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

        <!-- Grid row -->
        <div class="row">


            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 mx-auto my-md-4 my-0 mt-4 mb-1">

                <!-- Links -->
                <h5 class="font-weight-bold text-uppercase mb-4">Sections</h5>

                <ul class="list-unstyled text-light">
                    <li><p><a class="text-white" href="/kg">K.G</a></p></li>
                    <li><p><a class="text-white" href="/junior">Junior</a></p></li>
                    <li><p><a class="text-white" href="/middle">Middle</a></p></li>
                    <li><p><a class="text-white" href="/senior">Senior</a></p></li>
                </ul>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1">

                <!-- Contact details -->
                <h5 class="font-weight-bold text-uppercase mb-4">Address</h5>

                <ul class="list-unstyled">
                    <li><p><i class="fa fa-home mr-3"></i> 24 Mohamed Amin Shahib Street - Mostafa Kamel - Alexandria
                        </p></li>
                    <li><p><i class="fa fa-phone mr-3"></i> 03 - 035426655 </p></li>
                    <li><p><i class="fa fa-print mr-3"></i> 03 - 035425997</p></li>
                </ul>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 text-center mx-auto my-4">

                <!-- Social buttons -->
                <h5 class="font-weight-bold text-uppercase mb-4">Follow Us</h5>
                <a href="https://www.facebook.com/hodasharawyels"><i class="fa fa-facebook-square"
                                                                     style="font-size:48px;text-shadow: 1px 1px 1px #000022;color: #0000ff;"></i></a>


            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2018 Copyright : yousryelwrdany@gmail.com</div>
    <!-- Copyright -->

</footer>
<!-- Footer -->


</body>
</html>
