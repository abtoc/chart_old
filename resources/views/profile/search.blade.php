@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="{{ route('profile.index') }}" method="POST">
                    @csrf
                    <div class="card-header">プロフィール検索</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="sort">並び順</label>
                            <select name="sort" id="sort" class="custom-selector">
                                <option selected value="1">登録順</option>
                                <option value="2">ログイン順</option>
                            </select>
                        </div>
                        <button class="btn btn-primary btn-block">検索</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
