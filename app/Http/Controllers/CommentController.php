<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $post = Post::find(1);
        // $comment = new Comment;
        // $comment->comment = "Hi buddi.co.uk Comment 6";
        // $post = $post->comments()->save($comment);

        $comment = Comment::find(1);
        $post = Post::find(2);
        dd($comment, $post);
        $comment->post()->associate($post)->save();

        // $comment1 = new Comment;
        // $comment1->comment = "Hi buddi.com Comment 2";

        // $comment2 = new Comment;
        // $comment2->comment = "Hi buddi.com Comment 3";

        // $post = $post->comments()->saveMany([$comment1, $comment2]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
