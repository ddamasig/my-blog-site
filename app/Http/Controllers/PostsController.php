<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all Posts
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);

        // Edit the code below to modify the pagination style
        $postsLinks = $posts->links();
        $postsLinks = str_replace("class=\"pagination", "class=\"pagination pagination-sm", $postsLinks);

        // Page Header
        $pageHeader = "Welcome to Lorem Ipsum";

        // Return the index view and pass the posts as parameter
        return view('posts.index')->with(['posts' => $posts, 'postsLinks' => $postsLinks]);
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
        // Handle post creation
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:5999',
        ]);

        
        // Handle file upload
        if($request->hasFile('cover_image')) {
            // Get filename with ext
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get the filename only
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            // Get the ext only
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Get file name to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        
        // Create Post entry
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Retrieve the post by id
        $post = Post::find($id);
        // Show the full post
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find the post by id
        $post = Post::find($id);

        // Check for correct user
        if(auth()->user()->id !=$post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        return view('posts.edit')->with('post', $post);
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
        // Handle post creation
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:5999',
        ]);

        
        // Handle file upload
        if($request->hasFile('cover_image')) {
            // Get filename with ext
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get the filename only
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            // Get the ext only
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Get file name to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        
        // Create Post entry
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        // Check if the cover_image has been updated
        if($fileNameToStore != 'noimage.jpg')
            $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');
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

        // Check for correct user
        if(auth()->user()->id !=$post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        $post->delete();

        return redirect('/posts')->with('success', 'Post Deleted');
    }
}
