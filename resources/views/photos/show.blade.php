<h1>{{$photos->first()->section->section_name}}</h1>

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
                        @if(Auth::user())
                            @if(Auth::user()->type->type_name == "Admin")
                                <a class="btn btn-danger text-light" onclick="deletePhoto({{$photo->id}})">Delete</a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    baguetteBox.run('.tz-gallery');
</script>