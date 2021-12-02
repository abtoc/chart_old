<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $req)
    {
        $users = \App\User:: where('id', '<>', Auth::id());
        // Sort
        if( $req->input('sort') === '1' ){
            $users = $users->orderBy('created_at', 'desc');
        } elseif( $req->input('sort') === '2'){
            $users = $users->orderBy('last_login_at', 'desc');
        }
        $users = $users->get();
        return view('profile.index', ['users' => $users]);
    }
    public function view(\App\User $user)
    {
        return view('profile.view', ['user' => $user]);
    }
    public function search()
    {
        return view('profile.search');
    }
}
