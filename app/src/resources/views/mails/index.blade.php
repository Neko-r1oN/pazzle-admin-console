@extends('layouts')
@section('title','メール一覧表示画面')
@section('body')
    <h1>送付メール一覧</h1>
    <ul>
        <ul class="nav col-18 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="accounts" class="nav-link px-2">account</a></li>
            <li><a href="users" class="nav-link px-2 ">user</a></li>
            <li><a href="items" class="nav-link px-2 ">items</a></li>
            <li><a href="posItems" class="nav-link px-2 ">posItems</a></li>
            <li><a href="mails" class="nav-link px-2  link-secondary">mails</a></li>
        </ul>
        <table class="table">
            <thead class="table-dark">
            <tr>
                <th>メールID</th>
                <th>送付先ユーザー名</th>
                <th>メールタイトル</th>
                <th>メール本文</th>
                <th>送付アイテム名</th>
                <th>個数</th>
                <th>状態</th>
            </tr>
            </thead>
            <tbody>
            @foreach($mails as $mail)
                <tr>
                    <td>{{$mail['id']}}</td>
                    <td>{{$mail['user_name']}}</td>
                    <td>{{$mail['mail_title']}}</td>
                    <td>{{$mail['mail_message']}}</td>
                    <td>{{$mail['item_name']}}</td>
                    <td>{{$mail['item_num']}}</td>
                    <td>
                        @if($mail['isOpen'] === true)
                            開封済み
                        @else
                            未開封
                        @endif
                    </td>
                </tr>

        @endforeach
    </ul>
    <div class="col-md-3 text-end">
        <form method="POST" action="{{url('auth/doLogout')}}">
            @csrf
            <button type="submit" class="btn btn-outline-primary me-2">Logout</button>
        </form>
        <form method="GET" action="{{url('send')}}">
            @csrf
            <button type="submit" class="btn btn-outline-primary me-2">新規作成</button>
        </form>
    </div>
@endsection

