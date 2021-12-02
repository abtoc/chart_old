@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">プロフィール</div>
                <div class="card-body">
                    <ul>
                        <li>{{ $user->name }}</li>
                        <li></li>
                    </ul>
                    <a href="{{ route('message.create', ['user' => $user->id]) }}" class="btn btn-primary btn-block">メールを送る</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection