<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use App;

class EventDetController extends Controller
{
    public function index(Request $request, $id) {

		$client = new Client(['base_uri' =>'http://locus-api-dev.au-syd.mybluemix.net']);

    	$res1 = $client->request('GET', '/api/events/'.$id.'?access_token='.$request->session()->get('id'));
		$res2 = $client->request('GET', '/api/events?filter[limit]=6&filter[order_by]=event_date DESC'.'&access_token='.$request->session()->get('id'));
		$res3 = $client->request('GET', '/api/places?access_token='.$request->session()->get('id'));
		$res4 = $client->request('GET', '/api/categories?access_token='.$request->session()->get('id'));
		
		$x1 = json_decode($res1->getBody());
		$x2 = json_decode($res2->getBody(), true);
		$x3 = json_decode($res3->getBody());
		$x4 = json_decode($res4->getBody());

		$category_data = [];
		$place_data = [];
		foreach	($x4 as $key=>$value){

			if($value->id == $x1->categoryId){
				$category_data[$key] = $value->category_name;
				
				foreach ($x3 as $key2 => $value2) {
					
					if($value2->id == $x1->placeId){
						$place_data[$key2] = $value2->geolocation;
					}
				}
			}
		}

		$result = array('x3'=>$place_data, 'x4'=>$category_data, 'x1' =>$x1,'x2'=>$x2 );
		return view('event-details')->with('data',$result);	
    } 
}
