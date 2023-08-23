<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        return view('home');
    }

    public function adminHome()
    {
        return view('admin');
    }

    public function adminLogin(){
        return view('auth.login');
    }

    public function userDashboard(){
        return view('user');
    }

    public function userList(Request $request){
        $user_data = User::where('is_admin',0)->get();
        return view('admin.user-list',["user_data"=>$user_data]);
    }

    public function updateStatus(Request $request)
    {
        $user = User::find($request->user_id); 
        $user->is_verified = $request->status; 
        $user->save(); 
        return response()->json(['success'=>'Status change successfully.']); 
    }

}
