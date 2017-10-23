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
        $blogs = Blog::all()->sortByDesc('updated_at');
        $blogsArray = json_decode($blogs);

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
            'body' => $data['body'],
            'imageurl' => $data['imageurl']
        ]);
    }

    public function store(Request $request, Response $response)
    {
        $this->middleware('auth');
        $data = $request->all();
        $this->create($data);
        return redirect('blog');
    }

    public function editArticle($id)
    {
        $this->middleware('auth');
        $blog = Blog::find($id);
        return view('blogform', ['blog'=> $blog]);
    }

    public function updateArticle(Request $request, Response $response, $id)
    {
      $this->middleware('auth');
      $blog = Blog::find($id);
      $data = $request->all();
      $columns = ['title', 'small_desc', 'body', 'imageurl'];
      foreach($columns as $column){
        $blog[$column] = $data[$column];
      }
      $blog->save();
      return view('blogbyid', ['blog' => $blog]);

    }

    public function deleteArticle($id){
      $blog = Blog::find($id);
      $blog->delete();
      return redirect('blog');
    }
}
