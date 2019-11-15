<?php


namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat');
    }
}
