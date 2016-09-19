<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

use App\Category;

class PagesController extends Controller
{
    public function getIndex()
    {
    	$posts = Post::orderBy('created_at', 'DESC')->paginate(3);
        $categories = Category::all();
    	return view('pages.index')->withPosts($posts)->withCategories($categories);
    }

    public function getAbout()
    {
    	return 'About';
    }

    public function getContact()
    {
    	return 'Contact';
    }
}
