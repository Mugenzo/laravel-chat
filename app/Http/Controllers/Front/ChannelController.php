<?php


namespace App\Http\Controllers\Front;


use App\Channel;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    public function index()
    {
        return view('chats.index');
    }

    public function store(Request $request)
    {
        Channel::create($request->all());
        return redirect()->route('chats.index')->with('message', 'Чат создан');
    }

    public function show($id)
    {
        $channel = Channel::whereId($id)->first();
        return view('chats.show', compact('channel'));
    }

    public function settings($id)
    {
        $channel = Channel::whereId($id)->first();
        $users = User::where('id', '!=', $channel->id)->get();
        return view('chats.settings', compact('channel', 'users'));
    }

    public function settingsUpdate(Request $request, $id)
    {
        $channel = Channel::where('id', $id)->first();
        $channel->users()->sync($request->get('users'));

        return redirect()->route('chats.settings', $channel)->with('message', 'Список пользователей обновлен');
    }
}
