@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    @if(auth()->user()->id == $channel->owner)
                        <div class="card-header">
                            <a href="{{route('chats.settings', $channel)}}"><i class="fa fa-cog" aria-hidden="true"></i>Настройки</a>
                        </div>
                    @endif
                    <div class="card-body" id="chat">
                        <chat user="{{auth()->user()->id}}" channel="{{$channel->id}}" mes="{{$channel->messages}}"></chat>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

