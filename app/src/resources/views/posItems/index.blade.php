@extends('layouts')
@section('title','所持アイテム一覧')
@section('body')

    <ul>
        <ul class="nav col-18 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="accounts" class="nav-link px-2">account</a></li>
            <li><a href="users" class="nav-link px-2 ">user</a></li>
            <li><a href="items" class="nav-link px-2 ">items</a></li>
            <li><a href="posItems" class="nav-link px-2  link-secondary">posItems</a></li>
            <li><a href="mails" class="nav-link px-2">mails</a></li>
        </ul>
        <table class="table">
            <thead class="table-dark">
            <tr>
                <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">No</th>
                <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">プレイヤー名</th>
                <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">アイテム名</th>
                <th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">所持個数</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posItems as $pos)
                <tr>
                    <th>{{$pos['id']}}</th>
                    <th>{{$pos['user_name']}}</th>
                    <th>{{$pos['item_name']}}</th>
                    <th>{{$pos['item_num']}}</th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </ul>
    
@endsection
