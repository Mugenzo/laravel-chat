@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form action="{{route('chats.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="owner" value="{{auth()->user()->id}}">
                        <div class="card-header">
                            <input type="text" name="name">
                            <button type="submit">Создать</button>
                        </div>
                    </form>

                    <div class="card-header">Список чатов</div>

                    @foreach(auth()->user()->channels as $item)
                        <div class="card-body"><a href="{{route('chats.show', $item)}}">{{$item->name}}</a></div>
                    @endforeach

                    <div class="card-header">Список моих чатов</div>

                    @foreach(auth()->user()->myChannels as $item)
                        <div class="card-body"><a href="{{route('chats.show', $item)}}">{{$item->name}}</a></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

