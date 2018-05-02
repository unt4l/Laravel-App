<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Input;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\RequestOptions;
use Illuminate\FileSystem\FileSystem;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function forgotPassword(){
        return view('forgotpassword');
    }

    public function resetNewPassword(){
        return view('resetpassword');
    }

    public function resetPassword(Request $request){
        
        $email = $request->get('email');
        $client = new client();
        $token = $request->session()->get('id'); //'59NaPUGxHaDtmTgrPey63sviWHyXbXyLvWAtyQ9z6rDvhItVtaQlgxulRY2nt1gt';
        
        try{
            $res = $client->request('POST','http://locus-api-dev.au-syd.mybluemix.net/api/penggunas/reset?access_token='.$token,
                ['json'=>[
                    'email' => $email]
                ]);

                $result = json_decode($res->getbody());
                //return view('resetpassword');
                return redirect()->back();
                $request->session()->flash('status',$response->status()); 
                $request->session()->flash('alert-class', 'alert-success');
        }catch(RequestException $e){
            $response = $this->StatusCodeHandling($e);
            $request->session()->flash('status',$e); 
			$request->session()->flash('alert-class', 'alert-danger');
            return redirect()->route('/forgot')->with('error',$response->status());
        }
    }


    public function index(Request $request) {
        // $client = new Client(['base_uri' => 'https://citizen-living-api-dev.au-syd.mybluemix.net']);
        $client = new Client(['base_uri' => 'https://locus-api-dev.au-syd.mybluemix.net']);
     
        $res = $client->get('/api/penggunas/' . $request->session()->get('userid') . '?access_token=' . $request->session()->get('id')); 

        $profile = json_decode($res->getBody());
        
        return view('profile')->with('data', $profile);
    }

    public function update(Request $request) {

        if ($file = $request->file('image')) {
            $file = $request->file('image');
            $fileName = $request->session()->get('userid') . '.' . $file->getClientOriginalExtension();

            $api_upload_url = 'https://content.dropboxapi.com/2/files/upload';

            $headers = array('Authorization: Bearer F14yMTCl1FAAAAAAAAAAoabTsnus7u1aQAX0hZtAQ-0gR1GM6BR8gFUhYlSyY8nk',
                'Content-Type: application/octet-stream',
                'Dropbox-API-Arg: '.
                json_encode(
                    array(
                        "path"=> "/Batu/batusmarterfarmer/profile/" . $fileName,
                        "mode" => "overwrite",
                        "autorename" => true,
                        "mute" => false
                    )
                )

            );

            $ch = curl_init($api_upload_url);

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POST, true);

            $path = $file->getRealPath();
            $fp = fopen($path, 'rb');
            $filesize = filesize($path);

            curl_setopt($ch, CURLOPT_POSTFIELDS, fread($fp, $filesize));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            curl_close($ch);

            $api_shared_url = 'https://api.dropboxapi.com/2/sharing/create_shared_link';

            $headers = array('Authorization: Bearer F14yMTCl1FAAAAAAAAAAoabTsnus7u1aQAX0hZtAQ-0gR1GM6BR8gFUhYlSyY8nk',
                'Content-Type: application/json'
            );

            $ch = curl_init($api_shared_url);

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POST, true);

            $data = array( 'path' => '/Batu/batusmarterfarmer/profile/' . $fileName );

            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            echo $response;

            $shared_url = json_decode($response)->url;
            $shared_url = substr_replace( $shared_url, '1', strlen($shared_url) - 1);

            curl_close($ch);
        }
        else {
            $shared_url = $request->get('originalImage');
        }


        try {
        $client = new Client();

        $res = $client->request('patch','http://locus-api-dev.au-syd.mybluemix.net/api/penggunas/'.$request->session()->get('userId').'?access_token='.$request->session()->get('id'),
            ["json" => 
                [
                    "full_name" => $request->get('name'),
                    "email" => $request->get('email'),
                    "phone" => $request->get('phone'),
                    "photo" => $shared_url
                ]]);

                $result = json_decode($res->getBody());

                $request->session()->flash('status', 'Successfully update Profile!');
                return redirect()->route('profile');
                }
                catch(ClientException $e){
                    $request->session()->flash('status', 'Unable to Update Your Profile!');
                    return redirect()->route('profile');
                }
    }

    public function update2(Request $request){

        $name = $request->get('name');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $photo = $request->file('image');
        $image = base64_encode(file_get_contents($photo->path()));
        $namefile = 'img_'.time().'.png';
        
        if($image !=""){
            Storage::disk('public')->put($namefile, base64_decode($image));
        }
        
        $resultImg = array('nama_file'=>$namefile, 'base64'=>$image, 'detail'=>$photo);
        $client = new Client();

        //dd($resultImg);

        try{
            $req = $client->request('PATCH','http://locus-api-dev.au-syd.mybluemix.net/api/penggunas/'.$request->session()->get('userid').'?access_token='.$request->session()->get('id'),
            ['form_params' => [
                'full_name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'photo' => $namefile
            ]
            ]);
            
            $result = json_decode($req->getBody());
            //dd($result);
        }catch(ClientException $e){
            $request->session()->flash('status', 'Unable to Update Your Profile!');
            return redirect()->route('profile');
        }
    }

}
