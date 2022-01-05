<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Donation;
use App\Models\Post;
use App\Models\Feedback;
use App\Models\Doctor;
use App\Http\Controllers\HospitalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function index()
    {
    	$feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_to')
        ->get();

    	$doctors = DB::table('doctors')
    	->join('users', 'doctors.user_id', '=', 'users.id')
    	->get();

    	return view('users.doctor', compact('doctors', 'feedbacks'))
    	->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function store(Request $request)
    {
    	$data = $request->validate([
    		'first_name' => 'required',
    		'last_name' => 'required',
    		'specialization' => 'required',
    		'phone_number' => 'required',
    		'email' => 'required',
    		'user_id' => 'required',
    		'hospital_name' => 'required',
    		'created_by' => 'required'
    	]);

    	Doctor::create($request->All());

    	return redirect()->route('hospitals.index', '/hospitals')
        ->with('success', 'Doctor Added Successfully.');

    }
}
