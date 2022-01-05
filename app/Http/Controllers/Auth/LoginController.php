<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Feedback;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::INDEX;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	
	public function login(Request $request){
		
		$input = $request->all();
		
		$this->validate($request, [
		'email' => 'required|email',
		'password' => 'required',
		]);
		
		if(auth()->attempt(array('email' => $input['email'], 
		'password' => $input['password']))){
        
            $feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_to')
        ->where('feedbacks.viewed', '0')
        ->get();
			
			if(auth()->user()->is_admin == 1){
				
				return redirect()->route('donations.index', compact('feedbacks'));
			}else{

				return redirect()->route('donations.index', compact('feedbacks'));
			}
		}else{
			//return redirect()->route('login')
			//->with('error', 'Email Address or Password is Wrong.');
            return view('auth.login')->with('error', 'Email Address or Password is Wrong.');
		}
	}
}
