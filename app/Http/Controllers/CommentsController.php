<?php

namespace App\Http\Controllers;
use \App\Http\Controllers\Controller;
use App\Models\comments;
use Illuminate\Http\Request;
use Auth;
use App\Models\BlogPost;
class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function read()
    {
	
    /**
     * Show the form for creating a new resource.
     */
	 }
    public function create( Request $request, BlogPost $blogPost)
    {
	try {
	$newComment = comments::create([
			'blog_id' => $request->blog_id,
            'username' => Auth::user()->username,
            'comment' => $request->comment
			]);
			$posts = BlogPost::all();
			return view('blog.show', [
        'post' => $blogPost,
    ]); } catch (Exception $e) {
	print $e;
	die();

  

    return $e->getMessage();

};
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(comments $comments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(comments $comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, comments $comments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(comments $comments)
    {
       $comments->delete();

        return view ('home');  //
    }
}
