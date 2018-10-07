@extends('layouts.app')

@section('content')

    <div class="container text-center">
        <h1 class="display-3 text-danger">POSTS</h1>
        <Br>
        <div class="row">
            <div class="col-md-12 mx-auto">
                @foreach($sections as $section)
                    <a class="btn btn-danger btnYoussry text-white"
                       onclick="show_section_blog({{$section->first()->section->section_id}})">
                        {{$section->first()->section->section_name}}
                    </a>
                @endforeach
            </div>
        </div>

        <br><br>

        <div id="showBlog">

        </div>

    </div>

    <div id="wrong" style="display: none;">
        wrong....from ajax
    </div>


@endsection