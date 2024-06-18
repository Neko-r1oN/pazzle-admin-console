<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<h1>管理者ユーザー一覧</h1>
<ul>
    <ul class="nav col-18 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="userList" class="nav-link px-2 link-secondary">users</a></li>
        <li><a href="playerList" class="nav-link px-2  ">player</a></li>
        <li><a href="itemList" class="nav-link px-2 ">items</a></li>
        <li><a href="posItemList" class="nav-link px-2">posItems</a></li>
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
        </tr>
        </thead>
        <tbody>
        @foreach($accounts as $account)
            <tr>
                <th>{{$account['id']}}</th>
                <th>{{$account['name']}}</th>
                <th>{{$account['password']}}</th>
            </tr>
    @endforeach
</ul>
<div class="col-md-3 text-end">
    <form method="POST" action="{{url('auth/doLogout')}}">
        @csrf
        <button type="submit" class="btn btn-outline-primary me-2">Logout</button>
    </form>
</div>
</body>
</html>
