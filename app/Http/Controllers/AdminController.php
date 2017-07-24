<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Permission;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class AdminController extends Controller
{
  use EntrustUserTrait;
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
  }

  /**
   * Show the admin control panel.
   *
   * @return \Illuminate\Http\Response
   */
   public function index()
   {
     $users = User::all();
    //  $userArray = json_decode($users);
      return view('auth.controlpanel', ['users' =>$users]);
   }

   /**
    * Create the roles and permissions of the Site
    */
    public function createRoles()
    {
      $admin = Role::where('name', '=', 'siteadmin')->first();
      if(!$admin){
        $admin = new Role();
        $admin->name = 'siteadmin';
        $admin->display_name = 'Site Admin';
        $admin->description = "Controls everything";
        $admin->save();
      }
      $blogger = Role::where('name', '=', 'blogger')->first();
      if(!$blogger) {
        $blogger = new Role();
        $blogger->name = 'blogger';
        $blogger->display_name = "Blogger";
        $blogger->save();
      }
      $commenter = Role::where('name', '=', 'commenter')->first();
      if(!$commenter){
        $commenter = new Role();
        $commenter->name = "commenter";
        $commenter->display_name = "Commenter";
        $commenter->save();
      }
      $guest = Role::where('name', '=', 'guest')->first();
      if(!$guest){
        $guest = new Role();
        $guest->name = "guest";
        $guest->display_name = 'Guest';
        $guest->save();
      }

       $user = User::where('email', '=', 'mrouhiai@gmail.com')->first();
       if(!$user->hasRole('siteadmin')){
         $user->attachRole($admin);
       }

      $this->createPermissions($admin, $blogger, $commenter, $guest);
    }
    private function createPermissions($admin, $blogger, $commenter, $guest)
    {
      //permission to create posts
      $createPost = Permission::where('name', '=', 'create-post')->first();
      if(!$createPost){
        $createPost = new Permission();
        $createPost->name = "create-post";
        $createPost->display_name = "Create Post";
        $createPost->description = "ability to make posts on blogs";
        $createPost->save();
      }
      //permission to edit posts
      $editPost = Permission::where('name', '=', 'edit-post')->first();
      if(!$editPost){
        $editPost = new Permission();
        $editPost->name = 'edit-post';
        $editPost->display_name = "Edit Post";
        $editPost->description = "ability to edit an existing post";
        $editPost->save();
      }
      //permission to delete posts
      $deletePost = Permission::where('name', '=', 'delete-post')->first();
      if(!$deletePost){
        $deletePost = new Permission();
        $deletePost->name = "delete-post";
        $deletePost->display_name = "Delete Post";
        $deletePost->save();
      }
      //permission to comment on posts
      $commentPost = Permission::where('name', '=', 'comment-post')->first();
      if(!$commentPost){
        $commentPost = new Permission();
        $commentPost->name = "comment-post";
        $commentPost->display_name = "Comment Post";
        $commentPost->save();
      }
      //permission to give post feedback (like/dislike)
      $feedbackPost = Permission::where('name', '=', 'feedback-post')->first();
      if(!$feedbackPost){
        $feedbackPost = new Permission();
        $feedbackPost->name = 'feedback-post';
        $feedbackPost->display_name = "Feedback Post";
        $feedbackPost->save();
      }
        $blogger->attachPermissions(array($createPost, $editPost, $deletePost));
      // if(!$commenter->can('comment-post')){
        $commenter->attachPermissions(array($commentPost, $feedbackPost));
      // }
      // if(!$guest->can('feedback-post')){
        $guest->attachPermission($feedbackPost);
      // }
    }
}
