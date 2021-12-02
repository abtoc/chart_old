<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $heads = DB::table('heads')
            ->select('partner_id', DB::raw('max(msg_id) as msg_id'))
            ->where('user_id', Auth::user()->id)
            ->groupBy('partner_id')
            ->orderBy('msg_id', 'desc')
            ->get();
        return view('home', ['heads' => $heads]);
    }
}
