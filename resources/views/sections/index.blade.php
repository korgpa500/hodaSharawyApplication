@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="text-center display-4">Sections</div>
        <br><br>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Section Id</th>
                        <th>Section Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    @foreach($sections as $section)
                        <tbody>
                        <tr>
                            <td>{{$section->section_id}}</td>
                            <td>{{$section->section_name}}</td>
                            <td><a href="/sections/{{$section->section_id}}">Edit</a></td>
                            <td><a href="/sections/{{$section->section_id}}/delete" class="text-danger">Delete</a></td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
            <div class="col-md-6 jumbotron">
                @if(isset($oneSection))
                    <div class="display-4 text-center">Update Section</div>
                    <form action="/sections/{{$oneSection->section_id}}/edit" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Section Name</label>
                            <input type="text" name="section_name" class="form-control" value="{{$oneSection->section_name}}">
                        </div>
                        <input type="submit" class="btn btn-block btn-info" value="Update">
                    </form>
                    <br>
                    <a class="btn btn-block btn-outline-info" href="/sections">Cancel</a>
                @else
                    <div class="display-4 text-center">Add New Section</div>
                    <form action="/sections" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Type Name</label>
                            <input type="text" name="section_name" class="form-control">
                        </div>
                        <input type="submit" class="btn btn-block btn-info" value="Create">
                    </form>
                @endif
            </div>
        </div>
    </div>



@endsection