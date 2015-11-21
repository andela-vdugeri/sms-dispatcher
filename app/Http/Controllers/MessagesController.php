<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;
use App\Http\Requests;
use GuzzleHttp\Psr7\Request as Guzzle;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\HttpException;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function send(Request $request, Client $client)
    {

        if($request->ajax()){
           $response = $this->sendMessage($client, $request);

            return response()->json($response);
        }

        return redirect()->back();
    }

    public function getRequestHeaders()
    {
        $user = env('SMS_ENDPOINT_USER');
        $password = env('SMS_ENDPOINT_PASS');

        $authorization = base64_encode($user.':'.$password);

        return [
            'acccept' => 'application/json',
            'content-type' => 'application/json',
            'authorization' => 'Basic '.$authorization,
        ];
    }

    public function getRequestBody(Request $request)
    {
        return json_encode([
            'from' => Auth::user()->name,
            'to'   => $request->get('to'),
            'text' => $request->get('text')
        ]);

    }

    public function sendMessage(Client $client, $request)
    {
        $smsRequest = new Guzzle('POST', env('SMS_ENDPOINT'), $this->getRequestHeaders(), $this->getRequestBody($request));

        try{
            return $client->send($smsRequest);
        } catch (HttpException $e) {

            return $e->getMessage();
        }

    }

}
