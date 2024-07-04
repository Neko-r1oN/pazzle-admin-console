@extends('layouts')
@section('title','アイテム一覧')
@section('body')

    <ul>
        <ul class="nav col-18 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="accounts" class="nav-link px-2">account</a></li>
            <li><a href="users" class="nav-link px-2 ">user</a></li>
            <li><a href="items" class="nav-link px-2  link-secondary">items</a></li>
            <li><a href="posItems" class="nav-link px-2">posItems</a></li>
            <li><a href="mails" class="nav-link px-2  link-">mails</a></li>
            <li><a href="posMails" class="nav-link px-2">posMails</a></li>
            <li><a href="followList" class="nav-link px-2 ">followList</a></li>
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

@endsection
