<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\User;

use App\Http\Controllers\DonationController;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    //feedback stored using this controller

    public function store(Request $request)
    {
    	
    	$data = $request->validate([
    		'feedback_detail' => 'required',
    		'feedback_by' => 'required',
            'feedback_to' => 'required',
            'donation_id' => 'required'
    	]);

    	Feedback::create($request->all());

    	return redirect()->route('donations.index')
    	->with('success', 'Feedback Created Successfully.');

    }
}
