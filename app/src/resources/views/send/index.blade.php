@extends('layouts')
@section('title','メール作成画面')
@section('body')

    <div class="container">
        <div class="row">
            <h1 class="h3  font-weight-normal nav col-18 col-md-auto mb-2 justify-content-center mb-md-0">メール送信
            </h1>

            <form method="post" action="{{route('sent')}}">
                @csrf
                <input class="form-control" type="text" name="user_id" id="user_id"
                       placeholder="送信するユーザーID"><br>
                <input class="form-control" type="text" name="mail_id" id="mail_id" placeholder="送信するメールID"><br>
                <label for="button">
                    <button type="submit" class="btn btn-outline-primary me-2">送信する</button>
                </label>
            </form>

            <div class="col-md-3 text-end">
                <form method="get" action="{{route('users.index')}}">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary me-2">もどる</button>
                </form>

            </div>

        </div>
    </div>

@endsection
