@extends('layouts.app')
@section('content')
    <div class="container text-center">
        <h1 class="display-3 text-danger">GALLERY</h1>
        <Br>
        <div class="row">
            <div class="col-md-12 mx-auto">
        @foreach($sections as $section)
            <a class="btn btn-danger btnYoussry text-white"
               onclick="show_section_photos({{$section->first()->section->section_id}})">
                {{$section->first()->section->section_name}}
            </a>
        @endforeach
            </div>
        </div>

        <br><br>

        <div id="showPhotos">

        </div>

    </div>

    <div id="wrong" style="display: none;">
        wrong....from ajax
    </div>


    <!-- Modal Delete Image-->
    <div class="modal fade" id="DeleteImage" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger">Warning......</h4>
                </div>
                <div class="modal-body">
                    <label class="text-info active textWarning">
                        Image Was Deleted
                    </label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btnYoussry" data-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Image-->


@endsection