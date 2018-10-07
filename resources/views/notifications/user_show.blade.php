@extends('layouts.app')
@section('content')
    <div id="print" class="text-center">
        <div class="container text-center">

            <h2>Registered User</h2>
            <br>
            <table class="table borderLess">
                <tbody>
                <tr>
                    <td><b>Name:</b></td>
                    <td>{{$register->name}}</td>
                </tr>
                <tr>
                    <td><b>Email:</b></td>
                    <td>{{$register->email}}</td>
                </tr>
                <tr>
                    <td><b>Mobile:</b></td>
                    <td>{{$register->mobile}}</td>
                </tr>
                <tr>
                    <td><b>Section:</b></td>
                    <td>{{$register->section->section_name}}</td>
                </tr>
                <tr>
                    <td><b>Type:</b></td>
                    <td>{{$register->type->type_name}}</td>
                </tr>
                <tr>
                    <td><b>Date:</b></td>
                    <td>{{date('d-m-Y', strtotime($register->created_at))}}</td>
                </tr>
                <tr>
                    <td><b>Time:</b></td>
                    <td>{{date('H:m:i', strtotime($register->created_at))}}</td>
                </tr>
                </tbody>
            </table>
        </div>


    </div>

    <div class="text-center">
        <button class="btn btn-outline-primary" onclick="printDiv('print')">Print</button>
    </div>
@endsection