<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autors = User::all();

        return view('posts.addpost',compact('autors'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd(34);
        //Post::create($request->all());

        $post = new Post();
        $post->title =$request->title;
        $post->text =$request->text;
        $post->save();
        //dd($request->autors);
        $post->users()->attach($request->autors);

        return redirect()->route('admin.posts.index');
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

        return view('posts.singelpost',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post =Post::find($id);
        $autors =User::all();
        $autors2 =array();
        foreach ($autors as $autor){
            $autors2[$autor->id]=$autor->name;
        }
    //dd($autors2);

        return view('posts.editpost', compact('post','autors2'));
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
        $post =Post::find($id);

        $post->title =$request->title;
        $post->text=$request->text;

        $post->users()->sync($request->autors);
        $post->update();
        //$post->users()->attach($request->autors);
        return redirect()->route('admin.posts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::findOrFail($id);

        $post->delete();
        return back();
    }
}
