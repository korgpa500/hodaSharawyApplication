@extends('layouts.app')
@section('content')
    <br>
    <img src="{{asset('images/kg.png')}}" class="img-fluid">
    <div class="container text-center">

        <h2 class="textTitleY">{{config('app.fullName' ,'Houda Sharawy Language School')}}<BR>K.G</h2>

        <br>

        <h2 class="myColorText">NEWS AND EVENT</h2>

        <div class="container">
            @foreach($events as $event)
                <div class="card bg-transparent" style="margin-bottom: 5px;">
                    <div class="card-header">
                        <div class="row">
                            <div class="col col-md-8">
                                <h3>{{$event->event_title}}</h3>
                                <div class="row">
                                    <div class="col-md-4">
                                        <b>By :</b> {{$event->user->name}}
                                    </div>
                                    <div class="col-md-4">
                                        <span class="youssryicon youssryicon-calendar"></span>
                                        {{date('d-m-Y', strtotime($event->created_at))}}
                                    </div>
                                    <div class="col-md-4">
                                        <span class="youssryicon youssryicon-time"></span>
                                        {{date('h:i:s', strtotime($event->created_at))}}
                                    </div>
                                </div>
                            </div>
                            <div class="col col-md-2">
                                <h4 class="myColorText">{{$event->section->section_name}}</h4>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        @if($event->event_image != "")
                            <div class="card-image-top text-center">
                                <img src="{{asset('uploads/events') .'/'. $event->event_image}}" alt='{{$event->event_title}}' class="img-fluid"
                                     style="border-radius: 8px;">
                            </div>
                        @endif
                        <br>
                        <div class="card-text text-center">
                            <h5>{{$event->event_body}}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
            {{$events->links()}}
        </div>



        <br><br>


        <h2 class="myColorText">POSTS</h2>



        <div class="container">
            @foreach($posts as $post)
                <div class="card bg-transparent" style="margin-bottom: 5px;">
                    <div class="card-header myColorBg">
                        <div class="row text-white">
                            <div class="col col-md-8">
                                <h3>{{$post->post_title}}</h3>
                                <div class="row">
                                    <div class="col-md-4">
                                        <b>By :</b> {{$post->user->name}}
                                    </div>
                                    <div class="col-md-4">
                                        <span class="youssryicon youssryicon-calendar"></span>
                                        {{date('d-m-Y', strtotime($post->created_at))}}
                                    </div>
                                    <div class="col-md-4">
                                        <span class="youssryicon youssryicon-time"></span>
                                        {{date('h:i:s', strtotime($post->created_at))}}
                                    </div>
                                </div>
                            </div>
                            <div class="col col-md-2">
                                <h4>{{$post->section->section_name}}</h4>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        @if($post->post_image != "")
                            <div class="card-image-top text-center">
                                <img src="{{asset('uploads/posts') .'/'. $post->post_image}}" alt='{{$post->post_title}}' class="img-fluid"
                                     style="border-radius: 8px;">
                            </div>
                        @endif
                        <br>
                        <div class="card-text text-center">
                            <h5>{{$post->post_body}}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <br><br>


        <h2 class="myColorText">GALLERY</h2>

        <div class="tz-gallery">
            <div class="row">
                @foreach($photos as $photo)
                    <div class='col-sm-12 col-md-6 col-lg-4' id="{{$photo->id}}">
                        <div class="thumbnail img-thumbnail">
                            <a class='lightbox' href='{{asset('uploads/photos') .'/'. $photo->img_url}}'>
                                <img src="{{asset('uploads/photos') .'/'. $photo->img_url}}">
                            </a>
                            <div class='caption'>
                                <h6><b>{{$photo->title}}</b></h6>
                                <p>{{$photo->description}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <script>
            baguetteBox.run('.tz-gallery');
        </script>





        {{--<!-- about -->
        <div id="aboutSec">
            <div class="containerY text-center">
                <h2 class="textTitleY">{{config('app.fullName' ,'Houda Sharawy Language School')}} K.G</h2>
                <h2 class="textTitleY">ABOUT</h2>
                <h4>Kindergarten Mohammed Zahran name frequented every tongue of children's lives have a different form
                    of the game is the basis of education and smile and fun are the beginning and end of the day</h4>
                <br>
                <h4>Kindergarten</h4>
                <h4>A message of love and respect for each child</h4>
                <h4>One who plays and learns and grows up</h4>
                <h4>Her sunshine is shining everywhere</h4>
                <h4>Is a new life and hope in all her children</h4>

            </div>
        </div>
        <!-- end about -->

        <!-- mission -->
        <div id="newSec">
            <div class="container text-center">
                <h2 class="textTitleY">MISSION AND VISION</h2>
                <h2>Vision</h2>
                <h4>Raising a creative child, intellectually conscious, interacting with his community</h4>
                <h2>Mission</h2>
                <h4>
                    <ol>
                        <li>Child development Comprehensive development from all aspects of growth</li>
                        <li>Developing the talents of our children through participation in competitions and various
                            activities
                        </li>
                        <li>Continuing training for the teacher in order to achieve comprehensive and sustainable
                            development
                        </li>
                        <li>Involve parents with children in activities</li>
                        <li>Children visiting the surrounding environment</li>
                        <li>Training both the child and the teacher on modern technology</li>
                    </ol>
                </h4>
            </div>
        </div>
        <!--end mission -->
        <!-- quality -->
        <div id="qualitySec">
            <div class="container text-center">
                <h2 class="textTitleY">QUALITY</h2>
                <br>
                <h4>Quality Certificate in Education</h4>
                <h4>Renewal of the certificate of accreditation and quality in education 2016</h4>
                <h4>The first place in the music education competition for 14 consecutive years</h4>
                <h4>The first place and the police shield for the competition to develop the child's traffic
                    awareness</h4>
                <h4>First place for the kindergarten competition for 6 years</h4>
            </div>
        </div>
        <!-- end quality -->


        <!-- Contact -->
        <div id="contact" class="text-center container-fluid">
            <h1 class="textTitleY">CONTACT US</h1>
            <br><br>
            <div class="row">

                <div class="col-sm-12 col-md-12 col-lg-6 mx-auto">
                    <img src="{{asset('images/logot.png')}}" class="img-fluid">
                    <h3>Tel : 03 4269675</h3>
                    <h3>Email : zahran.kg@windowslive.com</h3>
                </div>

            </div>
        </div>--}}
    </div>

@endsection