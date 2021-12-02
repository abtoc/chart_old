@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">プロフィール一覧</div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        @foreach($users as $user)
                            <a href="{{ route('profile.view', ['user' => $user->id ]) }}" class="list-group-item list-group-item list-group-item-action">
                                <ul>
                                    <li>{{ $user->name }}</li>
                                    <li>{{ $user->last_login_at }}</li>
                                </ul>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
