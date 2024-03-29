<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=> ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('title','asc')->get();
        return view('posts.index')->with('posts', $posts);
    }

    public function my_posts()
    {
        $posts = Post::orderBy('title','asc')->get();
        return view('posts.my_posts')->with('posts', $posts);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|max:255',
            'body'=>'required',
            'cover_image' => 'image|nullable|max:1999|mimes:jpg,jpeg,bmp,svg,png'
        ]);
        if($request->hasFile('cover_image')){
            //get file name with extention
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just file extention
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //image uploading path
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }else{
            $post->cover_image =null;
        }
        $post->save();

        return redirect('/posts')->with('status','Your Post is Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        // $comments = Comment::find();
        $comments = Comment::all()->where('post_id', $id);
        return view('posts.show')->with('post',$post)->with('comments',$comments);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('status', 'Unauthorized page. You can not edit.');
        }
        return view('posts.edit')->with('post',$post);
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
        $this->validate($request,[
            'title'=>'required|max:255',
            'body'=>'required',
            'cover_image' => 'image|nullable|max:1999|mimes:jpg,jpeg,bmp,svg,png'
        ]);
        if($request->hasFile('cover_image')){
            //get file name with extention
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just file extention
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //image uploading path
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        $comments = Comment::all()->where('post_id', $post->id);
        $post = Post::find($post->id);
        return view('posts.show')->with('post',$post)->with('comments',$comments)->with('status','Your Post is Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        // if(auth()->user()->id !== $post->user_id){
        //     return redirect('/posts')->with('error', 'Unauthorized page.');
        // }

        if($post->cover_image !== null){
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();
        //TODO - handle return url
        if(redirect()->back()->getTargetUrl() == 'http://127.0.0.1:8000/my_posts'){
            return redirect('/my_posts')->with('status','Post is Removed successfully.');
        }else{
            return redirect('/posts')->with('status','Post is Removed successfully.');
        }
    }

}
