@extends('layouts')
@section('title','アイテム一覧表示画面')
@section('body')
    <h1>アイテム一覧</h1>
    <ul>
        <ul class="nav col-18 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="accounts" class="nav-link px-2">account</a></li>
            <li><a href="users" class="nav-link px-2 ">user</a></li>
            <li><a href="items" class="nav-link px-2  link-secondary">items</a></li>
            <li><a href="posItems" class="nav-link px-2">posItems</a></li>
            <li><a href="mails" class="nav-link px-2">mails</a></li>
        </ul>
        <table class="table">
            <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>アイテム名</th>
                <th>種別</th>
                <th>効果値</th>
                <th>説明</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <th>{{$item['id']}}</th>
                    <th>{{$item['name']}}</th>
                    <th>{{$item['type']}}</th>
                    <th>{{$item['effect']}}</th>
                    <th>{{$item['text']}}</th>
                </tr>
        @endforeach
    </ul>
    <div class="col-md-3 text-end">
        <form method="POST" action="{{url('auth/doLogout')}}">
            @csrf
            <button type="submit" class="btn btn-outline-primary me-2">Logout</button>
        </form>
    </div>
@endsection
