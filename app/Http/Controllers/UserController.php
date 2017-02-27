<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | User Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the requests that are related to the User Model
    | besides the creation and logging in. ie: change password and deletion
    |
    */

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function index()
    {
        return view('change', []);
    }
    protected function updateemail()
    {
        return view('updateemail');
    }
    protected function change(Request $request, Response $response)
    {
        $data = $request->all();
        if(isset($data['password']){
            if($data['password'] == $data['password_confirmation']){
                $result = $request->user()->fill([
                    'password' => Hash::make($request->password)
                ])->save();
            }
        } else if(isset($data['email'])) {
            $result = $request->user()->fill([
                'email' => $request->email
            ])->save();
        }
        if($result){
            return redirect('/');
        }
    }
    protected function removeuser(Request $request)
    {
        $data = $request->all();
        $request->user()->delete();
        return redirect('/logout');
    }
}
