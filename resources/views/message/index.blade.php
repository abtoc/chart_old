@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">メール履歴</div>
                <div class="card-body">
                    <ul>
                        <li>
                            <a href="{{ route('profile.view', ['user'=>$user->id]) }}">{{ $user->name }}</a>
                        </li>
                    </ul>
                    <a href="{{ route('message.create', ['user' => $user->id]) }}" class="btn btn-primary btn-block">メールを送る</a>
                    <div class="kaiwa imessage mt-2">
                        @foreach($messages as $message)
                                @if($message->send)
                                    <div class="fukidasi right">
                                        {!! nl2br(e($message->msg->body)) !!}</br>
                                        <div class="date_time_info">{{ $message->msg->created_at->format('m/d H:G') }}</div>
                                    </div>
                                @else
                                    <div class="fukidasi left">
                                        {!! nl2br(e($message->msg->body)) !!}</br>
                                        <div class="date_time_info">{{ $message->msg->created_at->format('m/d H:G') }}</div>
                                    </div>
                                @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection