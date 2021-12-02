<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(\App\User $user)
    {
        $messages = Auth::user()->heads()->where('partner_id', $user->id)
            ->orderBy('created_at', 'desc')->get();
        return view('message.index', ['user'=>$user, 'messages'=>$messages]);
     }
    public function create(\App\User $user)
    {
        return view('message.create', ['user' => $user]);
    }
    public function post(\App\User $user, Request $req)
    {
        $from_id = Auth::user()->id;
        $to_id = $user->id;
        $body = $req->input('body');

        \App\Msg::send($from_id, $to_id, $body);
        return redirect()->route('message.index', ['user'=>$to_id])->with('message', '送信しました');
    }
}
