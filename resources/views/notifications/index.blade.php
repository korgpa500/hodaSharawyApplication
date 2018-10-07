@extends('layouts.app')
@section('content')



    <div class="container">
        <div class="text-center display-4">Notifications</div>
        <br><br>
        <h3 class="text-center display-5 myColorText">Message And Suggestions</h3>
        <br>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <table class="table">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Date</th>
                        <th>Title</th>
                        <th>Show</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($suggestions as $suggestion)
                        <tr id="{{$suggestion->id}}">
                            @if($suggestion->read == 0)
                                <td class="animated infinite swing text-danger">New</td>
                            @else
                                <td class="animated infinite pulse text-info">Seen</td>
                            @endif
                            <td>{{date('d-m-Y', strtotime($suggestion->created_at))}}</td>
                            <td>{{$suggestion->title}}</td>
                            <td><a href="/notification/{{$suggestion->id}}/suggestion" class="btn btn-info">Show</a>
                            </td>
                            <td>
                                <button onclick="deleteSuggestion({{$suggestion->id}})" class="btn btn-danger">Delete
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No Message Were Found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="justify-content-center">{{$suggestions->links()}}</div>
                <hr>
                <h3 class="text-center display-5 myColorText">Register</h3>
                <br>
                <table class="table">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Show</th>
                        <th>Approve</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($registers as $register)
                        <tr id="{{$register->id}}Delete">
                            @if($register->read == 0)
                                <td class="animated infinite swing text-danger">New</td>
                            @else
                                <td class="animated infinite pulse text-info">Seen</td>
                            @endif
                            <td>{{date('d-m-Y', strtotime($register->created_at))}}</td>
                            <td>{{$register->name}}</td>
                            <td><a href="/notification/{{$register->id}}/show" class="btn btn-info">Show</a></td>
                            <td>
                                <button onclick="approveUser({{$register->id}})" class="btn btn-info">Approve</button>
                            </td>
                            <td>
                                <button onclick="IgnoreUser({{$register->id}})" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="5">No New Register Were Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{$registers->links()}}
            </div>
        </div>
    </div>


    <!-- Modal Delete Suggestion-->
    <div class="modal fade" id="DeleteSuggestion" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger">Warning......</h4>
                </div>
                <div class="modal-body">
                    <label class="text-info active textWarning">
                        Message Or Suggestions Was Deleted
                    </label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btnYoussry" data-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Suggestion-->

    <!-- Modal Add Registered User-->
    <div class="modal fade" id="AddedUser" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-info">Success......</h4>
                </div>
                <div class="modal-body">
                    <label class="text-info active textWarning">
                        User Has Been Added
                    </label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btnYoussry" data-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Add user-->


    <!-- Modal Ignore Registered User-->
    <div class="modal fade" id="IgnoredUser" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger">Success......</h4>
                </div>
                <div class="modal-body">
                    <label class="text-danger active textWarning">
                        User Has Been Ignored
                    </label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btnYoussry" data-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Ignore user-->


@endsection