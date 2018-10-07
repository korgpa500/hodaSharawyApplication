<h1>{{$posts->first()->section->section_name}}</h1>

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