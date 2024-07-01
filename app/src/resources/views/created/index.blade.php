@extends('layouts')
@section('title','アカウント作成完了画面')
@section('body')

    <form class=" h3   font-weight-normal nav col-18 col-md-auto mb-2 justify-content-center mb-md-0" method="get"
          action="{{url('accounts.index')}}">
        @csrf
        <div class="container">
            <div class="row">
                <h1 class="h3  font-weight-normal nav col-18 col-md-auto mb-2 justify-content-center mb-md-0">
                    アカウント登録</h1>

                <h1>登録完了しました</h1>
            </div>
        </div>
    </form>
    <form method="get" action="{{route('index')}}">
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="action">もどる</button>
    </form>
@endsection
