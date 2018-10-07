<?php

namespace App\Http\Controllers;

use App\Register;
use App\Section;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    function show()
    {
        return view('users.register');
    }

    function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|numeric|min:7|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $dataMail = [
            'email' => $request->email,
            'subject' => 'Registration Complete',
            'bodyMessage' => 'Welcome Mr/Mrs : ' . $request->name . ' as soon as we will activation your Account',
        ];

        Mail::send('users.register_mail', $dataMail, function ($message) use ($dataMail) {
            $message->from('yousryelwrdany@gmail.com');
            $message->to($dataMail['email']);
            $message->subject($dataMail['subject']);
        });

        Register::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
            'section_id' => Section::where('section_name', 'General')->first()->section_id,
            'type_id' => Type::where('type_name', 'Guest')->first()->type_id,
            'read' => 0, // 0 = unread  ,1 = read
        ]);

        return redirect()->back()->with('message', 'IT WORKS!');
    }
}
