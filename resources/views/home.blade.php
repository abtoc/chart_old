@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="list-group">
                        @foreach($heads as $head)
                            @php
                                $msg = \App\Msg::find($head->msg_id);
                                preg_match("/^(?:.*+\n?){0,2}+/", $msg->body, $matches);
                                $partner = \App\User::find($head->partner_id);   
                            @endphp
                            <a href="{{ route('message.index', ['user' => $partner->id]) }}" class="list-group-item list-group-item-action">
                                <h5>{{ $partner->name }}</h5>
                                <p>{!! nl2br(e($matches[0])) !!}</p>
                            </a>
                        @endforeach
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
