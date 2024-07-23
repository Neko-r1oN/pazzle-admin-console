@extends('layouts')
@section('title','マスターアチーブメント一覧')
@section('body')
    <ul>
        <ul class="nav col-18 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="accounts" class="nav-link px-2">account</a></li>
            <li><a href="users" class="nav-link px-2 ">user</a></li>
            <li><a href="items" class="nav-link px-2 ">items</a></li>
            <li><a href="posItems" class="nav-link px-2 ">posItems</a></li>
            <li><a href="mails" class="nav-link px-2  link-secondary">mails</a></li>
            <li><a href="posMails" class="nav-link px-2">posMails</a></li>
            <li><a href="followList" class="nav-link px-2 ">followList</a></li>
        </ul>
        <table class="table">
            <thead class="table-dark">
            <tr>
                <th>アチーブメントID</th>
                <th>アチーブ名</th>
                <th>メッセージ</th>
                <th>獲得経験値</th>
            </tr>
            </thead>
            <tbody>
            @foreach($achieves as $achieve)
                <tr>
                    <td>{{$achieve['id']}}</td>
                    <td>{{$achieve['title']}}</td>
                    <td>{{$achieve['message']}}</td>
                    <td>{{$achieve['exp']}}</td>
                </tr>
        @endforeach
    </ul>
@endsection
