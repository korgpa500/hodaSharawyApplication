@extends('layouts.app')
@section('content')
    <div class="container text-center">
        <h1>Edit User</h1>

        <div class="row">
            <div class="col-md-6 mx-auto">
                <form action="/users" method="post">
                    @csrf
                    <div class="form-group">
                        <label>ID : </label>
                        <input type="text" name="user_id" readonly class="form-control" value="{{$user->user_id}}">
                    </div>
                    <div class="form-group">
                        <label>Name : </label>
                        <input type="text" name="name" readonly class="form-control" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label>Email : </label>
                        <input type="text" name="email" readonly class="form-control" value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label>Section : </label>
                        <select name="section_id" class="form-control">
                            <option value="{{$user->section->section_id}}">{{$user->section->section_name}}</option>
                            <option value="{{$user->section->section_id}}">_____________________</option>
                            @foreach($sections as $section)
                                <option value="{{$section->section_id}}">{{$section->section_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Type : </label>
                        <select name="type_id" class="form-control">
                            <option value="{{$user->type->type_id}}">{{$user->type->type_name}}</option>
                            <option value="{{$user->type->type_id}}">_____________________</option>
                            @foreach($types as $type)
                                <option value="{{$type->type_id}}">{{$type->type_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <input type="submit" value="Update" class="btn btn-outline-primary">

                </form>
            </div>
        </div>
    </div>
@endsection