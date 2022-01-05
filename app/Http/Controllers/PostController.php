<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    
    public function index(){

    	$posts = Post::latest()->paginate(5);
    	$users = User::all();
        $feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_to')
        ->get();


    	return view('posts.index', compact('posts', 'users', 'feedbacks'))
    	->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(){

    	return view('posts.create');

    }

    public function store(Request $request){

    	$request->validate([

    		'name' => 'required',
    		'title' => 'required',
    		'detail' => 'required',
    		'location' => 'required'
    	]);

    	Post::create($request->all());

    	return redirect()->route('posts.index')
    	->with('success', 'Post Created Successfully');

    }

    public function show(Post $post){

        $feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_to')
        ->get();

    	return view('posts.show', compact('post', 'feedbacks'));

    }

    public function edit(Post $post){

        $feedbacks = DB::table('users')
        ->join('feedbacks', 'users.id', '=', 'feedbacks.feedback_to')
        ->get();
        
    	return view('posts.edit', compact('post'));

    }

    public function update(Request $request, Post $post){

    	$request->validate([
    		'name' => 'required',
    		'title' => 'required',
    		'detail' => 'required',
    		'location' => 'required'
    	]);

    	$post->update($request->all());

    	return redirect()->route('posts.index')
    	->with('success', 'Post Updated Successfully.');
    }

    public function destroy(Post $post){

    	$post->delete();

    	return redirect()->route('posts.index')
    	->with('success', 'Post Deleted Successfully.');
    }
}
