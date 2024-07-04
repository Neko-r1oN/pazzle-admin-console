@extends('layouts')
@section('title','ユーザー一覧')
@section('body')

    <ul>
        <ul class="nav col-18 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="accounts" class="nav-link px-2">account</a></li>
            <li><a href="users" class="nav-link px-2  link-secondary">user</a></li>
            <li><a href="items" class="nav-link px-2 ">items</a></li>
            <li><a href="posItems" class="nav-link px-2">posItems</a></li>
            <li><a href="mails" class="nav-link px-2  link-">mails</a></li>
            <li><a href="posMails" class="nav-link px-2">posMails</a></li>
            <li><a href="followList" class="nav-link px-2 ">followList</a></li>
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
            </tbody>
        </table>
    </ul>

@endsection
