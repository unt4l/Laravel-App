<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use App;

class PlaceOfInterestCatController extends Controller
{
    public function index(Request $request) {

    	$client = new Client(['base_uri' => 'http://locus-api-dev.au-syd.mybluemix.net']);

    	$res = $client->request('GET', '/api/Places?filter[order_by]=total_rate desc'.'&access_token='.$request->session()->get('id'));

        $x = json_decode($res->getBody(), true);

    	return view('placeofinterest-category')->with('x',$x);	
    } 
}
