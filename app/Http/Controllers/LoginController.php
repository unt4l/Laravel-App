<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class LoginController extends Controller
{
    public function index(Request $request) {
    	return view('login')->with('error','');	
	}
	
	public function regist(){
		return view('register');
	}

    public function login(Request $request) {
    	$username = $request->get('username');
    	$password = $request->get('password');	

    	$client = new Client(['base_uri' => 'http://locus-api-dev.au-syd.mybluemix.net']);

		try {
			$res = $client->post('/api/penggunas/login',["json" => ["username" => $username,"password" => $password]]);
			$x = json_decode($res->getBody());
			$request->session()->put('id',$x->id);
			$request->session()->put('username', $username);
			$request->session()->put('userid',$x->userId);
			$res2 = $client->get('/api/penggunas/'.$request->session()->get('userid').'?access_token='.$request->session()->get('id'));
			$y = json_decode($res2->getBody());
			return redirect()->route('main');
			$request->session()->flash('status','Successfully login'); 
			$request->session()->flash('alert-class', 'alert-success'); 
		} catch (ClientException $e) {
			if ($e->getResponse()) {
				$error = json_decode($e->getResponse()->getBody(),true);
				$request->session()->flash('message', $error['error']['message']); 
				$request->session()->flash('alert-class', 'alert-danger'); 
				return redirect()->route('login')->with('error',$error['error']['message']);
			}
		}
    }
}
