<?php


namespace App\Http\Controllers\Messages;


use App\Events\MessageEvent;
use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function send(Request $request)
    {
        try {
            $message = Message::create([
                'user_id' => auth()->user()->id,
                'message' => $request->get('m'),
                'channel_id' => $request->get('c')
            ]);

            $object = Message::where('id', $message->id)->with('user')->first();
            event(new MessageEvent($request->get('c'), $object));
            return '200';
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
