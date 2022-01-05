<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Events\MessageSent;

class ChatsController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	* Show chats
	*
	* @return \Illuminate\Http\Response
	*/

	public function index()
	{
		$feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_to')
        ->get();

        $users = Auth::user()->all();
        //$messages = Message::with('user')->get();

        $sentmessages = DB::table('users')
        ->join('messages', 'users.id', '=', 'messages.user_id')
        ->where('sender_id', '=', Auth::user()->id)
        ->get();

        $recieved = DB::table('users')
        ->join('messages', 'users.id', '=', 'messages.user_id')
        ->where('receiver_id', '=', Auth::user()->id)
        ->get();

        //var_dump($messages);
        //die();

		return view('users.messages', compact('feedbacks', 'users', 'sentmessages', 'recieved'));
	}

	/**
	* Fetch all messages
	* 
	* @return Message
	*/

	public function fetchMessages()
	{
		return Message::with('user')->get();
	}
    
    /**
    * Persist message to database
    * 
    * @param Request $request
    * @param Response
    */

    public function sendMessage(Request $request)
    {
    	$user =  Auth::user();

    	$data = $request->validate([
    		'user_id' => 'required',
    		'sender_id' => 'required',
    		'receiver_id' => 'required',
    		'message' => 'required'
    	]);

    	Message::create($request->all());

        return redirect()->route('chats.index')
        ->with('success', 'Message Sent.');

    	//var_dump($data);
    	//die();

    	//$message = $user->messages()->create([
    	//	'message' => $request->input('message')
    	//]);

    	//broadcast(new MessageSent($user, $message))->toOthers();

    	//return ['status' => 'Message Sent!'];
    }
}
