@extends('layouts')
@section('title','アイテムログ')
@section('body')

    <ul>
        <ul class="nav col-18 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="itemLogs" class="nav-link px-2  link-secondary">itemLog</a></li>
            <li><a href="followLogs" class="nav-link px-2 ">followLog</a></li>
            <li><a href="mailLogs" class="nav-link px-2 ">mailLog</a></li>
        </ul>
        <table class="table">
            <thead class="table-dark">
            <tr>
                <th>ログID</th>
                <th>対象ユーザー</th>
                <th>対象アイテム</th>
                <th>増減個数</th>
                <th>生成日時</th>
            </tr>
            </thead>
            <tbody>
            @foreach($logs as $log)
                <tr>
                    <td>{{$log['id']}}</td>
                    <td>{{$log['get_user_id']}}</td>
                    <td>{{$log['get_item_id']}}</td>
                    <td>{{$log['get_item_num']}}</td>
                    <td>{{$log['created_at']}}</td>

                </tr>

        @endforeach
    </ul>

@endsection

