<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use App;

class NewsDetailsController extends Controller
{
    public function index(Request $request, $id) {

		$client = new Client(['base_uri' => 'http://locus-api-dev.au-syd.mybluemix.net']);

    	$res1 = $client->request('GET', '/api/News/'.$id.'?access_token='.$request->session()->get('id'));
    	$res2 = $client->request('GET', '/api/news?filter[limit]=6&filter[order_by]=posted_date DESC'.'&access_token='.$request->session()->get('id'));

		$x1 = json_decode($res1->getBody(), true);
		$x2 = json_decode($res2->getBody(), true);

    	$result = array('x1' => $x1, 'x2' => $x2 );

    	return view('news-details')->with('data',$result);	
    } 
}