<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\RequestOptions;
use App;
use Datetime;
use Session;

class LikeController extends Controller{

    public function like(Request $request){
        $module = $request->get('title');
        $Accid = $request->get('userId');
        $token = $request->session()->get('id');
        $id = $request->get('id');

        //$result = array('judul'=>$module, 'accId'=>$Accid, 'token'=>$token, 'ID'=>$id);
        try {
            $client = new client();
            $res = $client->request('POST','http://locus-api-dev.au-syd.mybluemix.net/api/likes?access_token='.$token,
            ['form_params' => [
                'module_name' => $module,
                'moduleId' => $id,
                'accountid' => $Accid
            ]]);

            $result = json_decode($res->getbody());
            dd($result);

            return view('/placeofinterest-details/'.$id);
            
        } catch (RequestException $e) {
            //$response = $this->StatusCodeHandling($e);
            //return view('/placeofinterest-details/'.$id);
            //dd($response);
            //return view('/placeofinterest-details/'.$id)->with('status',$response);
        }
    }
}
