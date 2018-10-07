@extends('layouts.app')
@section('content')

    <div class="container text-center">
        <img src="{{asset('images/event.png')}}" class="img-fluid">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card cardY">
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="row justify-content-center">
                                <div class="col-md-4 col-lg-8">
                                    Welcome Back {{Auth::user()->name}}
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <button class="btn btn-outline-light" onclick="addNewEvent()">Add New Event</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


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
                                @if(Auth::user())
                                    @if(Auth::user()->type->type_name == "Admin" || Auth::user()->user_id == $event->user_id)
                                        <div class="col col-md-2 text-right">
                                            <a href="/events/{{$event->event_id}}/destroy" class="btn btn-danger">Delete</a>
                                        </div>
                                    @endif
                                @endif
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



        <!-- Modal Add New Event -->
        <div class="modal fade" id="AddEvent" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title myColorText">Add New Event.....</h4>
                    </div>
                    <div class="modal-body">
                        <form action="/events" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="event_title" placeholder="Event Or News Title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="event_body" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="file" name="event_image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Select Section</label>
                                <select name="section_id" class="form-control">
                                    @foreach(\App\Section::where('section_name' ,'!=' ,'Admin')->get() as $section)
                                        <option value="{{$section->section_id}}">{{$section->section_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="submit" value="Add" class="btn btn-outline-danger form-control">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btnYoussry" data-dismiss="modal">Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Add Event-->

@endsection