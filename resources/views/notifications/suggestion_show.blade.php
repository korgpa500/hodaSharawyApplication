@extends('layouts.app')
@section('content')
    <div id="print" class="text-center">
        <div class="container text-center">

            <h2 class="">Suggestion && Message</h2>
            <br>
            <table class="table borderLess">
                <tbody>
                <tr>
                    <td><b>Title:</b></td>
                    <td>{{$suggestion->title}}</td>
                </tr>
                <tr>
                    <td><b>From:</b></td>
                    <td>{{$suggestion->sender_name}}</td>
                </tr>
                <tr>
                    <td><b>Email:</b></td>
                    <td>{{$suggestion->sender_email}}</td>
                </tr>
                <tr>
                    <td><b>Section:</b></td>
                    <td>{{$suggestion->section->section_name}}</td>
                </tr>
                <tr>
                    <td><b>Date:</b></td>
                    <td>{{date('d-m-Y', strtotime($suggestion->created_at))}}</td>
                </tr>
                <tr>
                    <td><b>Time:</b></td>
                    <td>{{date('H:m:i', strtotime($suggestion->created_at))}}</td>
                </tr>
                <tr>
                    <td><b>Message:</b></td>
                    <td colspan="3">{{$suggestion->sender_message}}</td>
                </tr>
                </tbody>
            </table>
        </div>


    </div>

    <div class="text-center">
        <button class="btn btn-outline-primary" onclick="printDiv('print')">Print</button>
    </div>
@endsection