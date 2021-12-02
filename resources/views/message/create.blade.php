@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('message.post', ['user'=>$user->id]) }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">メール送信</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="body">本文</label>
                            <textarea name="body" id="body" rows="10" class="form-control"></textarea>
                        </div>
                        <button class="btn btn-primary btn-block">送信</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
