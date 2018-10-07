@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="text-center display-4">Users</div>
        <br><br>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <table class="table table-hover table-responsive-lg">
                    <thead class="myColorBg text-white font-weight-bold">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Section</th>
                        <th>Mobile</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    @foreach($users as $user)
                        <tbody>
                        <tr id="{{$user->user_id}}">
                            <td>{{$user->user_id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->type->type_name}}</td>
                            <td>{{$user->section->section_name}}</td>
                            <td>{{$user->mobile}}</td>
                            <td><a class="btn btn-info" href="/users/{{$user->user_id}}/edit">Edit</a></td>
                            <td>
                                <button class="btn btn-danger" onclick="DeleteUserAjax({{$user->user_id}})">Delete
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>


    <!-- Modal Delete User-->
    <div class="modal fade" id="DeleteUser" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger">Success......</h4>
                </div>
                <div class="modal-body">
                    <label class="text-danger active textWarning">
                        User Has Been Deleted
                    </label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btnYoussry" data-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete user-->

@endsection