<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Permission;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class AdminController extends Controller
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
   * Show the admin control panel.
   *
   * @return \Illuminate\Http\Response
   */
   public function index()
   {

   }

   /**
    * Create the roles and permissions of the Site
    */
    public function createRoles()
    {
      $admin = new Role();
      $admin->name = 'siteadmin';
      $admin->display_name = 'Site Administrator';
      $admin->description = 'User can control all aspects of the site';
      $admin->save();

      $blogger = new Role();
      $blogger->name = 'blogger';
      $blogger->display_name = 'Blog writer';
      $blogger->description = 'User can post, edit, and delete blogs';
      $blogger->save();

      $commenter = new Role();
      $commenter->name = 'commenter';
      $commenter->display_name = 'blog commenter';
      $commenter->description = 'User may like, dislike, or comment on posts';
      $commenter->save();

      $guest = new Role();
      $guest->name = 'guest';
      $guest->display_name = 'guest';
      $guest->description = 'User may like, and dislike posts';
      $guest->save();

      $user = User::where('email', '=', 'mrouhiai@gmail.com')->first();
      $user->attachRole($admin);

      $this->createPermissions($admin, $blogger, $commenter, $guest);
    }
    private function createPermissions($admin, $blogger, $commenter, $guest)
    {
      //permission to create posts
      $createPost = new Permission();
      $createPost->name = 'create-post';
      $createPost->description = 'allow a user to create new blog posts';
      $createPost->save();

      //permission to edit posts
      $editPost = new Permission();
      $editPost->name = 'edit-post';
      $editPost->description = 'allow a user to edit blog posts';
      $editPost->save();

      //permission to delete posts
      $deletePost = new Permission();
      $deletePost->name = 'delete-post';
      $deletePost->description = 'allow a user to delete blog posts';
      $deletePost->save();

      //permission to comment on posts
      $commentPost = new Permission();
      $commentPost->name = 'comment-post';
      $commentPost->description = 'allow a user to comment on blog posts';
      $deletePost->save();

      //permission to give post feedback (like/dislike)
      $feedbackPost = new Permission();
      $feedbackPost->name = 'feedback-post';
      $feedbackPost->description = 'allow a user to like or dislike posts';
      $feedbackPost->save();

      $blogger->attachPermissions(array($createPost, $editPost, $deletePost));
      $commenter->attachPermissions(array($commentPost, $feedbackPost));
      $guest->attachPermission($feedbackPost);
    }
}
