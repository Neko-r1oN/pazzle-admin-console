@extends('layouts')
@section('title','ユーザー一覧画面')
@section('body')
    
    <h1>ユーザー一覧</h1>
    <ul>
        <ul class="nav col-18 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="accounts" class="nav-link px-2">account</a></li>
            <li><a href="users" class="nav-link px-2  link-secondary">user</a></li>
            <li><a href="items" class="nav-link px-2 ">items</a></li>
            <li><a href="posItems" class="nav-link px-2">posItems</a></li>
            <li><a href="mails" class="nav-link px-2">mails</a></li>
        </ul>
        <div class="justify-content-center">
            {{$users->links('vendor.pagination.bootstrap-5')}}
        </div>
        <table class="table">
            <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>名前</th>
                <th>レベル</th>
                <th>経験値</th>
                <th>ライフ</th>

            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th>{{$user['id']}}</th>
                    <th>{{$user['name']}}</th>
                    <th>{{$user['level']}}</th>
                    <th>{{$user['exp']}}</th>
                    <th>{{$user['life']}}</th>
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
