<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \GuzzleHttp\Client;
use Response;
use Auth;
use App\User;
use Session;
class LoginController extends Controller
{
    public function masuk(){
		return view('masuk');
	}
    public function akses(Request $request)
    {
    	$client = new Client(['base_uri' => 'https://firman.web.id/api/public/api/']);
	 	$response = $client->request('POST', 'login', [
	 		'form_params' => [
	 			'email' => $request->input('email'),
	 			'password' => $request->input('password')
	 		]
	 	]);
	 	$token = $response->getBody()->getContents();
	 	
	 	$user = $client->request('POST', 'details', [
            'headers' => ['Authorization' => 'Bearer ' . $token,
            			 'Accept' 		=> 'application/json']
        ]);
        $user1 = json_decode($user->getBody()->getContents(),true);
        $asw = $user1['success']['name'];
        $asw1 = $user1['success']['email'];
        if($user1)
        {
        	Session::put('name', $asw);
        	Session::put('email', $asw1);
        	return redirect('hasil');
        }
    }

    public function hasil()
    {
    	return view('hasil');
    }

    public function data()
    {
        return view('data');
    }

    public function keluar()
    {
        Session::flush();
        return view('data');
    }
}
