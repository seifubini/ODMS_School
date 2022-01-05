<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //user controller fetches users from @Auth display users and their type

    public function index()
    {
    	$users = User::All();

        $feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_to')
        ->get();

    	return view('users.index', compact('users', 'feedbacks'))
    	->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function show(User $user)
    {
    	//return view('users.edit', compact('user'));

    }

    public function donee(){

    	$users = DB::table('users')
        ->join('donees', 'users.id', '=', 'donees.user_id')
        ->get();

        $feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_to')
        ->get();

    	return view('users.donee', compact('users', 'feedbacks'))
    	->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function donor(){

        $users = DB::table('users')
        ->join('donors', 'users.id', '=', 'donors.user_id')
        ->get();

        $feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_to')
        ->get();

        return view('users.donor', compact('users', 'feedbacks'))
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function bank(){

        $users = DB::table('users')->where('user_type', 'bank')->get();

        $feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_to')
        ->get();

        return view('users.organization', compact('users', 'feedbacks'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function organization(){

    	$users = DB::table('users')->where('user_type', 'bank')->get();

        $feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_to')
        ->get();

    	return view('users.organization', compact('users', 'feedbacks'))
    	->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function doctors(){
        $users = DB::table('users')->where('user_type', 'doctor')->get();

        $feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_to')
        ->get();

    	return view('users.doctor', compact('users', 'feedbacks'))
    	->with('i', (request()->input('page', 1) - 1) * 5);	
    }

    public function userProfile(Request $request)
    {
        $id = Auth::user()->id;
        $user = DB::table('users')->where('id', $id)->first();
        $feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_to')
        ->get();

        //var_dump($user);
        //die();

        return view('auth.UpdateProfile', compact('user', 'feedbacks'));
    
    }

    public function updateProfile(Request $request, User $user, $id)
    {
        $users = DB::table('users')->where('id', $id)->first();

        $feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_to')
        ->get();

        $update = DB::table('users')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        

        return redirect()->route('donations.index', compact('user', 'feedbacks'))
        ->with('success', 'Profile Updated Successfully.');

        
        //else{
          //  echo "wrong input.";
        //}

       // return view('auth.UpdateProfile', compact('user', 'feedbacks', 'id'))
        //->with('success', 'Post Updated Successfully.');

    }
}
