<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Exception\ClientException;
use Auth;

class LogoutController extends Controller
{
    public function logout(Request $request) {
        
    	$client = new Client(['base_uri' => 'https://locus-api-dev.au-syd.mybluemix.net']);

    	try {
    		$res = $client->post('/api/penggunas/logout?access_token=' . $request->session()->get('id'));
    		$request->session()->flush();
    		return redirect('/');
    	} catch (ServerException $e) {
    		if ($e->getResponse()) {
    			$request->session()->flush();
                return redirect('/');
    		}	
    	} catch (ClientException $e) {
            if ($e->getResponse()) {
                $error = json_decode($e->getResponse()->getBody(),true);
                echo $error['error']['message'];
            }   
        }
    }
}
