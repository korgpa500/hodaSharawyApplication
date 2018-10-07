@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="text-center display-4">Types</div>
        <br><br>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Type Id</th>
                        <th>Type Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    @foreach($types as $type)
                        <tbody>
                        <tr>
                            <td>{{$type->type_id}}</td>
                            <td>{{$type->type_name}}</td>
                            <td><a href="/types/{{$type->type_id}}">Edit</a></td>
                            <td><a href="/types/{{$type->type_id}}/delete" class="text-danger">Delete</a></td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
            <div class="col-md-6 jumbotron">
                @if(isset($oneType))
                    <div class="display-4 text-center">Update Type</div>
                    <form action="/types/{{$oneType->type_id}}/edit" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Type Name</label>
                            <input type="text" name="type_name" class="form-control" value="{{$oneType->type_name}}">
                        </div>
                        <input type="submit" class="btn btn-block btn-info" value="Update">
                    </form>
                    <br>
                    <a class="btn btn-block btn-outline-info" href="/types">Cancel</a>
                @else
                    <div class="display-4 text-center">Add New Types</div>
                    <form action="/types" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Type Name</label>
                            <input type="text" name="type_name" class="form-control">
                        </div>
                        <input type="submit" class="btn btn-block btn-info" value="Create">
                    </form>
                @endif
            </div>
        </div>
    </div>



@endsection