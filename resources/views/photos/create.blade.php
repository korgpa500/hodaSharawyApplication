@extends('layouts.app')
@section('content')
    <div class="container text-center">

        <!-- start create photo-->
        <h1>Add New Photo</h1>
        <hr>


        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <form action="/photos" method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="form-group">
                        <input type="text" name="title"
                               class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="youssry"
                               placeholder="Image Title" value="{{old('title')}}" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="description"
                               class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" id="youssry"
                               placeholder="Image Description" value="{{old('description')}}" required>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Select Section</label>
                        <select name="section_id" class="form-control" id="youssry">
                            @foreach($sections as $section)
                                <option value="{{$section->section_id}}">{{$section->section_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="file" name="img_url" class="form-control" id="youssry">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Save" class="form-control btn btn-info btnYoussry">
                    </div>
                </form>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <img src="{{asset('images/gallery.png')}}" class="img-fluid">
            </div>
        </div>
        <!-- end create -->
    </div>




    @if($errors)
        <!-- Modal Error not upload-->
        <div class="modal fade" id="UploadError" role="dialog">
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
                                        $('#UploadError').modal('show');
                                    });
                                </script>

                                {{$error}} <br>
                            @endforeach
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btnYoussry" data-dismiss="modal">Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Uploaded-->
    @endif

    @if(session()->has('upload_image'))
        <!-- Modal Sent Message-->
        <div class="modal fade" id="UploadOk" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-info">Success.....</h4>
                    </div>
                    <div class="modal-body">
                        <label class="text-info active textWarning">
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('#UploadOk').modal('show');
                                });
                            </script>
                            Thank you,your photo has ben uploaded........
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info btnYoussry" data-dismiss="modal">Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Uploaded-->

    @endif

@endsection