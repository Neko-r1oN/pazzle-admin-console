@extends('layouts')
@section('title','アカウント一覧表示画面')
@section('body')

    <h1>管理者アカウント一覧</h1>
    <ul>
        <ul class="nav col-18 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="accounts" class="nav-link px-2 link-secondary">account</a></li>
            <li><a href="users" class="nav-link px-2  ">user</a></li>
            <li><a href="items" class="nav-link px-2 ">items</a></li>
            <li><a href="posItems" class="nav-link px-2">posItems</a></li>
            <li><a href="mails" class="nav-link px-2">mails</a></li>
        </ul>
        <div class="form-group">
            <input
                type="text"
                class="form-control"
                id="search-box"
                placeholder="ユーザー名を入力(未対応です)"
            />
        </div>
        <button type="button" class="btn btn-success search-button">検索</button>
        <table class="table">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>パスワード</th>
                <th>アカウント操作</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($accounts as $account)
                <tr>
                    <td>{{$account['id']}}</td>
                    <td>{{$account['name']}}</td>
                    <td>{{$account['password']}}</td>
                    <td>
                        <a href="{{ route('accounts.destroy', ['id'=>$account['id']]) }}"
                           class="btn btn-danger">削除</a>
                        <a href="{{ route('accounts.showUpdate', ['id'=>$account['id']]) }}"
                           class="btn btn-success">更新</a>
                    </td>
                </tr>

        @endforeach
    </ul>
    <div class="col-md-3 text-end">
        <form method="POST" action="{{url('auth/doLogout')}}">
            @csrf
            <button type="submit" class="btn btn-outline-primary me-2">Logout</button>
        </form>

        <form method="GET" action="{{url('accounts/create')}}">
            @csrf
            <button type="submit" class="btn btn-outline-primary me-2">新規登録</button>
        </form>
    </div>

@endsection
