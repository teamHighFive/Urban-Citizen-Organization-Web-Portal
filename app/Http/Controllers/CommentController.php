<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $comments = Comment::All();
        // return view('posts.show')->with('comments', $comments);
    }


    public function store(Request $request,$post_id)
    {
        $upload = new Comment();

        $upload->comment_body = $request->input('comment_body');
        $upload->post_id = $post_id;
        $upload->user_id = Auth::user()->id;

        $upload->save();
        return redirect()->back();//->with('upload',$upload);
        
    }



    public function table_comments_files()
    {
        $upload = Comment::all();
        return view('posts.comments')->with('upload',$upload);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function stoere(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editfile($primary)
    {
        {
            $upload = Comment::find($primary);
            return view('posts.comment-editform')->with('upload',$upload);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
