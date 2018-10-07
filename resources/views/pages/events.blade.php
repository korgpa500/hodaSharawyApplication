@extends('layouts.app')

@section('content')

    <div class="container text-center">
        <img src="{{asset('images/event.png')}}" class="img-fluid">


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


    </div>



@endsection