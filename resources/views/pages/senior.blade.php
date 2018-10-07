@extends('layouts.app')
@section('content')

    <div class="text-center"><img src="{{asset('images/student.png')}}" class="img-fluid"></div>

    <div class="container text-center">

        <h2 class="textTitleY">{{config('app.fullName' ,'Houda Sharawy Language School')}}<br>SENIOR</h2>

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

    </div>

@endsection