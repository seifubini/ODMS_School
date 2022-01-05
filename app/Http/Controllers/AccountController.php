<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Hospital;
use App\Models\Donee;
use App\Models\Donor;
use App\Models\Bank;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		//$id = Auth::id();
		$feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_to')
        ->get();

		return view('home', compact('feedbacks'));
	}

	public function store(Request $request)
	{
        
		$request->validate(['user_type' => 'required']);
        $type = $request->user_type;

        if($type == "bank")
        { 
        	/***/

        $bank = $request->validate([
                'user_type' => 'required',
                'name' => 'required',
                'phone_number' => 'required',
                'created_by' => 'required'
            ]);

        
        $id = $request->user_id;
        
        DB::table('users')->where('id', $id)
            ->update(['user_type' => $type]);
            Bank::create($request->all());
        	return redirect()->route('donations.index')
        ->with('success', 'Account Updated Successfully.');
        }

        elseif($type == "hospital"){

            $hospital = $request->validate([
            'user_type' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'name' => 'required',
            'email' => 'required',
            'user_id' => 'required'
        ]);
            $id = $request->user_id;

            DB::table('users')->where('id', $id)
            ->update(['user_type' => $type]);
            Hospital::create($request->all());
            
        }

        else{
            echo "there is something wrong with your input";
        }

	}

	/**public function addDoctor(Request $request)
	{
		$users = DB::table('users')->where('user_type', 'doctor');

		return view('hospitals.addDoctor', compact('users'));
	} */
}
