<?php

namespace App\Http\Controllers;
require('../vendor/autoload.php');
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Mailgun\Mailgun;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Method that sends me an email when someone submits the contact form
     * @return \Illuminate\Http\Response
     */
    public function submitContactForm(Request $request, Response $response, $args = [])
    {
        $data = $request->all();
        $secret = env('MAILGUN_SECRET');
        $mgClient = new Mailgun($secret);
        $domain = env('MAIL_HOST');
        $result = $mgClient->sendMessage($domain, array(
                'from' => 'Site User <'.$data['email'].'>',
                'to' => 'Me <'. env('DEFAULT_MAIL_TO') .'>',
                'subject' => $data['subject'],
                'text' => $data['body']
            ));
        if($result->http_response_code == 200){
            return redirect->back()->with('message', 'successfully sent message!');
        }
        return redirect->back()->with('message', 'Error! Failed to send message. Try again later.');
    }
}
