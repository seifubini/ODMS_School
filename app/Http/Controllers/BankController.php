<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Feedback;
use App\Models\Bank;
use App\Models\Bank_account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BankController extends Controller
{
    public function index()
    {

        $banks = $records = DB::table('users')
            ->Join('banks', 'users.id', '=', 'banks.id')
            ->get();

        $feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_to')
        ->get();

        return view('users.organization', compact('banks', 'feedbacks'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        

    }

    public function store(Request $request, Bank $bank)
    {
        $data = $request->validate([
            'account_type' => 'required',
            'account_id' => 'required',
            'account' => 'required',
            'bank_id' => 'required'
        ]);

        //var_dump($data);
        //die();

        Bank_account::create($request->all());

        $feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_to')
        ->get();

        return redirect()->route('banks.index', compact('bank', 'feedbacks'))
        ->with('success', 'Record Created Successfully.');

    }

    public function show(Bank $bank)
    {
        $banks = $records = DB::table('users')
            ->Join('banks', 'users.id', '=', 'banks.id')
            ->Join('bank_accounts', 'banks.id', '=', 'bank_accounts.bank_id')
            ->get();

    	$feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_to')
        ->get();

    	return view('banks.show', compact('bank', 'banks', 'feedbacks'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        $bank->delete();

        $feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_to')
        ->get();

        return redirect()->route('banks.index', compact('feedbacks'))
        ->with('success', 'Record Deleted Successfully.');
    }
}
