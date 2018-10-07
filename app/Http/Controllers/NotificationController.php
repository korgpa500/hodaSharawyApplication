<?php

namespace App\Http\Controllers;

use App\Register;
use App\Suggestion;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    function index()
    {
        $suggestions = Suggestion::orderBy('created_at', 'desc')->paginate(5);
        $registers = Register::orderBy('created_at', 'desc')->paginate(5);
        return view('notifications.index')->with('suggestions', $suggestions)->with('registers', $registers);
    }

    function showSuggestion($suggestion_id)
    {
        $suggestion = Suggestion::find($suggestion_id);
        $suggestion->read = 1;
        $suggestion->save();
        return view('notifications.suggestion_show')->with('suggestion', $suggestion);
    }

    function deleteSuggestion($suggestion_id)
    {
        $suggestion = Suggestion::find($suggestion_id);
        $suggestion->delete();
    }

    function showUser($register_id)
    {
        $register = Register::find($register_id);
        $register->read = 1;
        $register->save();
        return view('notifications.user_show')->with('register', $register);
    }

    function addUserRegistered($register_id)
    {
        $userRegister = Register::find($register_id);

        User::create([
            'name' => $userRegister->name,
            'email' => $userRegister->email,
            'mobile' => $userRegister->mobile,
            'password' => $userRegister->password,
            'type_id' => $userRegister->type_id,
            'section_id' => $userRegister->section_id,
        ]);


        $dataMail = [
            'email' => $userRegister->email,
            'subject' => 'Registration Complete',
            'bodyMessage' => 'Welcome Mr/Mrs : ' . $userRegister->name . ' Your Account has been activated',
        ];

        Mail::send('users.register_mail', $dataMail, function ($message) use ($dataMail) {
            $message->from('yousryelwrdany@gmail.com');
            $message->to($dataMail['email']);
            $message->subject($dataMail['subject']);
        });

        $userRegister->delete();
    }

    function ignoreUserRegistered($register_id)
    {
        $userRegister = Register::find($register_id);

        $dataMail = [
            'email' => $userRegister->email,
            'subject' => 'Registration Ignored',
            'bodyMessage' => 'Hello Mr/Mrs : ' . $userRegister->name . ' Your Account has been DELETED\nPlease contact to admin',
        ];

        Mail::send('users.register_mail', $dataMail, function ($message) use ($dataMail) {
            $message->from('yousryelwrdany@gmail.com');
            $message->to($dataMail['email']);
            $message->subject($dataMail['subject']);
        });

        $userRegister->delete();
    }
}
