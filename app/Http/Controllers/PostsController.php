<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

use App\Category;

use App\Tag;

use Session;

use Image;

class PostsController extends Controller
{

    /* Use Auth middleware for this controller */
    public function __construct()
    {
        $this->middleware("auth");
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(6);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
                'title'           => 'required|max:255',
                'slug'            => 'required|alpha-dash|min:3|unique:posts,slug',
                'category_id'     => 'required|integer',
                'body'            => 'required|min:5',
            ));

        $post = new Post;
        $post->title        = $request->title;
        $post->slug         = $request->slug;
        $post->category_id  = $request->category_id;
        $post->body         = $request->body;

        //Save Image
        if($request->hasFile('featured_img'))
        {
            $image    = $request->file('featured_img');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('/assets/images/'.$filename);
            Image::make($image)->resize(800, 300)->save($location);

            $post->image = $filename;
        }

        $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'New post created successfully!');

        return redirect()->route('posts.show', $post->id);
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
        return view('posts.show')->withPost($post);
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

        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tag2 = array();
        foreach ($tags as $tag) {
            $tag2[$tag->id] = $tag->name;
        }

        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tag2);
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
        $post = Post::find($id);
        if($post->slug == $request->slug)
        {
            $this->validate($request, array(
                'title'       => 'required|max:255',
                'category_id' => 'required|integer',
                'body'        => 'required|min:5',
            ));
        }
        else
        {
            $this->validate($request, array(
                'title'       => 'required|max:255',
                'slug'        => 'required|alpha-dash|min:3|unique:posts,slug',
                'category_id' => 'required|integer',
                'body'        => 'required|min:5',
            ));
        }

        
        $post->title        = $request->title;
        $post->slug         = $request->slug;
        $post->category_id  = $request->category_id;
        $post->body         = $request->body;
        $post->save();

        if (isset($request->tags))
        {
            $post->tags()->sync($request->tags);
        }
        else
        {
            $post->tags()->sync(array());
        }

        Session::flash('success', 'One post updated successfully!');

        return redirect()->route('posts.show', $post->id);
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
        $post->tags()->detach();
        $post->delete();
        Session::flash('success', 'One post deleted successfully!');
        return redirect()->route('posts.index');
    }
}
