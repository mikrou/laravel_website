<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Blog;
use App\Likes;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;

class LikeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
	}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function triggerLike(Request $request, $id, $parentType) {
		$userId = Auth::user()->id;
		$liked = Likes::where('user_id', '=', $userId)->where('parent_id', '=', $id)->where('parent_type', '=', $parentType)->get();
		if(count($liked) === 0) {
			//currently logged in user hasn't liked this post yet, insert into like table
			Likes::insert([
				'user_id' => $userId,
				'parent_id' => $id,
				'parent_type' => $parentType
			]);
		} else {
			foreach($liked as $like){
				$like->delete();
			}
		}
		if($parentType === 'blog'){
			$blog = \DB::table('blogs')->find($id);
			$blog->likes = Likes::where('parent_id', '=', $id)->where('parent_type', '=', 'blog');
			$request->session()->flash('message.level', 'success');
			if(count($liked) === 0){
				$request->session()->flash('message.content', 'blog liked!');
			} else {
				$request->session()->flash('message.content', 'blog unliked');
			}
			return redirect('/blog/'. $blog->id);
		} else {
			$item = \DB::table('comments')->find($id);
			$blog = \DB::table('blogs')->where('id', '=', $item->parent_id)->get();
			return redirect('/blog/'. $blog->id);
		}
	}
}
