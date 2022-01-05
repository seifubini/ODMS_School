<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Hospital_Record;
use App\Models\Doctor;
use App\Models\Donee;
use App\Models\Donor;
use App\Models\Bank;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class HospitalRecordController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
 
    	$feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_to')
        ->get();

        $records = DB::table('hospital__records')
            ->crossJoin('hospitals')
            ->crossJoin('doctors')
            ->crossJoin('donees')
            ->get();

        //var_dump($records);
        //die();

        return view('hospitals.records', compact('records', 'feedbacks'))
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function create(){

    	$donees = DB::table('users')->where('user_type', 'donee')->get();
    	$doctors = DB::table('users')->where('user_type', 'doctor')->get();
    	$hospitals = DB::table('users')
    	->join('hospitals', 'users.id', '=', 'hospitals.user_id')->get();
    	$feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_to')
        ->get();
        //var_dump($donees);
        //die();

        return view('hospitals.create_record', compact('donees', 'doctors', 'hospitals', 'feedbacks'));

    }

    public function store(Request $request){

        $request->validate([
            'donee_id' => 'required',
            'doctor_id' => 'required',
            'hospital_id' => 'required',
            'description' => 'required'
        ]);

        Hospital_Record::create($request->All());

        return redirect()->route('records.index')
        ->with('success', 'Record Created Successfully.');

        //var_dump($data);
        //die();
    }
}
