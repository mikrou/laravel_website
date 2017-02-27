<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        $blogsArray = ['blogs' => $blogs];
        return view('blog', $blogsArray);
    }

    /**
     * Create a new blog instance.
     *
     * @param  array  $data
     * @return Blog
     */
    protected function create(array $data)
    {
        return Blog::create([
            'title' => $data['title'],
            'small_desc' => $data['small_desc'],
            'body' => $data['body']
        ]);
    }
}
