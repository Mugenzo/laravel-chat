@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form class="card" action="{{route('chats.settings.update', $channel)}}" method="post">
                    @csrf
                    <div class="card-header">
                        Список пользователей в чате
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach($users as $user)
                                <li class="list-group-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="{{$user->id}}"
                                               name="users[]" value="{{$user->id}}"
                                        @if($channel->users->contains($user->id)) checked @endif>
                                        <label class="custom-control-label" for="{{$user->id}}">{{$user->name}}</label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success">Обновить</button>
                        <a class="btn btn-secondary" href="{{route('chats.show', $channel)}}">Назад</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

