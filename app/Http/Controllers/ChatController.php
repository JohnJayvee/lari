<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat');
    }

    public function sendMessage(Request $request)
    {
        $message = $request->input('message');

        // Broadcast the message to the socket.io server
        $url = env('SOCKET_IO_SERVER');
        $client = new \GuzzleHttp\Client();
        $client->post($url, [
            'form_params' => [
                'message' => $message,
            ]
        ]);

        return response()->json(['status' => 'Message sent!']);
    }
}