<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        $blogsArray = json_decode($blogs);

        //sorts the blogs by date
        usort($blogsArray, function($a, $b) {
            $v1 = strtotime($a->updated_at);
            $v2 = strtotime($b->updated_at);
            return ($v1 > $v2)? -1: 1;
        });
        
        $data = ['blogs' => $blogsArray];
        return view('blog', $data);
    }

    public function blogarticle($id)
    {
        $blog = Blog::find($id);
        if($blog){
            return view('blogbyid', ['blog'=> $blog]);
        }
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

    public function createpost(Request $request, Response $response)
    {
        $this->middleware('auth');
        $data = $request->all();
        $this->create($data);
        return redirect('blog');
    }
}
