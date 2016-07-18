<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\User;
use App\Friend;

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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $user = $request->user();
        $users = $user->not_friends();

        return view('home', [
                'user' => $user,
                'users' => $users,
            ]);
    }

    public function create_friend(Request $request)
    {
        Friend::insert([[
                        'user_id' => $request->user_id,
                        'friend_id' => $request->other_id,
                    ], [
                        'user_id' => $request->other_id,
                        'friend_id' => $request->user_id,
                    ]]);

        return redirect('/home');
    }

    public function remove_friend(Request $request)
    {
        $user_id = $request->user()->id;
        $friend_id = $request->id;

        Friend::where('user_id', $user_id)->where('friend_id', $friend_id)->delete();
        Friend::where('user_id', $friend_id)->where('friend_id', $user_id)->delete();

        return redirect('/home');
    }
}
