<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Donation;
use App\Models\Post;
use App\Models\Feedback;
use Illuminate\Http\Request;

//we call the DB facade to facilitate the select statements  
use Illuminate\Support\Facades\DB;

class DonationController extends Controller
{
    /**
    *Display a listing of the resoure 
    *
    *select data from users and donations db and join the results and *sent it to the view
    *
    *@return type is \Illuminate\Http\Response
    */
    
    public function index(){

    	$donations = DB::table('users')
    	->join('donations', 'users.id', '=', 'donations.donation_created_by')
    	->get();

        $feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_to')
        ->get();

    	return view('donations.index', compact('donations', 'feedbacks'))
    	->with('i', (request()->input('page', 1) - 1) * 5);
    }

    //a function to create a new record
    // return type @
    public function create(){

        $feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_to')
        ->get();

    	return view('donations.create', compact('feedbacks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request){

    	$request->validate([
    		'donation_name' => 'required',
    		'donation_description' => 'required',
    		'donation_location' => 'required',
    	]);

          
        Donation::create($request->all());

        return redirect()->route('donations.index')
        ->with('success', 'Donation Created Successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    //show function to display records and information
    //will check viewed feedbacks as read when opened
    public function show(Donation $donation){

        $feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_by')
        ->where('feedbacks.donation_id', $donation->id)
        ->get();

        $id = $donation->id;
        $update = DB::update(
            'update feedbacks set viewed = 1 where donation_id = ?', [$id]
        );

        return view('donations.show', compact('donation', 'feedbacks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Donation $donation)
    {
        $feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_by')
        ->where('feedbacks.donation_id', $donation->id)
        ->get();

        return view('donations.edit', compact('donation', 'feedbacks'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donation $donation)
    {
        $request->validate([
            'donation_name' => 'required',
            'donation_description' => 'required',
            'donation_location' => 'required',
        ]);

        $donation->update($request->all());

        return redirect()->route('donations.index')
        ->with('success', 'Post Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function delete(Donation $donation)
    {
        $donation->delete();

        return redirect()->route('donations.index')
        ->with('success', 'Post Deleted Successfully.');
    }

    
}
