@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $user->name }}</div>

                <div class="panel-body">
                    <img src="{{ $user->avatar }}">
                    <div>{{ $user->email }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Friendlist</div>

                <div class="panel-body">
                    @foreach($user->friends() as $friend)
                        <div>{{ $friend->name }} <a href="{{ route('send_message', $friend->id) }}">Send a message</a>
                            <form method="POST" action="{{ route('remove_friend', $friend->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input class="btn btn-warning" type="submit" value="Remove a friend">
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Become a friend of that user!</div>

                <div class="panel-body">
                    @foreach($users as $other_user)
                        @if($user->id != $other_user->id)
                            <div>{{ $other_user->name }} 
                                <form method="POST" action="{{ route('create_friend', ['user_id' => $user->id, 'other_id' => $other_user->id]) }}">
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-success" value="Become a friends!">
                                </form>
                            </div>
                        @endif
                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
