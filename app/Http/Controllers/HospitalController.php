<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\User;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HospitalController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$hospitals = Hospital::All();

		$feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_to')
        ->get();

		return view('hospitals.index', compact('hospitals', 'feedbacks'))
    	->with('i', (request()->input('page', 1) - 1) * 5);

	}
    
    public function create()
    {
        $feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_to')
        ->get();

    	return view('hospitals.create', compact('feedbacks'));
    }

    public function store(Request $request, Hospital $hospital)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'user_id' => 'required'
        ]);

        //var_dump($data);
        //die();

        Hospital::create($request->all());

        $feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_to')
        ->get();

        return redirect()->route('hospitals.index', compact('hospital', 'feedbacks'))
        ->with('success', 'Hospital Created Successfully.');

    }

    public function show(Hospital $hospital)
    {
    	$feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_to')
        ->get();

        $doctors = DB::table('users')->where('user_type', 'doctor')->get();

    	return view('hospitals.show', compact('hospital', 'feedbacks', 'doctors'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $hospital)
    {
        $hospital->delete();

        $hospitals = Hospital::All();

        $feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_to')
        ->get();

        return view('hospitals.index', compact('hospitals', 'feedbacks'))
        ->with('i', 'success', 'Post Deleted Successfully.', (request()->input('page', 1) - 1) * 5);
    }
}
