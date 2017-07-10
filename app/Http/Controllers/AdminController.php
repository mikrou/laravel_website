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

   }

   /**
    * Create the roles and permissions of the Site
    */
    public function createRoles()
    {
      $admin = Role::where('name', '=', 'siteadmin')->first();
      $blogger = Role::where('name', '=', 'blogger')->first();
      $commenter = Role::where('name', '=', 'commenter')->first();
      $guest = Role::where('name', '=', 'guest')->first();

      // $user = User::where('email', '=', 'mrouhiai@gmail.com')->first();
      // $user->attachRole($admin);

      $this->createPermissions($admin, $blogger, $commenter, $guest);
    }
    private function createPermissions($admin, $blogger, $commenter, $guest)
    {
      //permission to create posts
      $createPost = Permission::where('name', '=', 'create-post')->first();

      //permission to edit posts
      $editPost = Permission::where('name', '=', 'edit-post')->first();

      //permission to delete posts
      $deletePost = Permission::where('name', '=', 'delete-post')->first();

      //permission to comment on posts
      $commentPost = Permission::where('name', '=', 'comment-post')->first();

      //permission to give post feedback (like/dislike)
      $feedbackPost = Permission::where('name', '=', 'feedback-post')->first();

      // $blogger->attachPermissions(array($createPost, $editPost, $deletePost));
      $commenter->attachPermissions(array($commentPost, $feedbackPost));
      // $guest->attachPermission($feedbackPost);
    }
}
