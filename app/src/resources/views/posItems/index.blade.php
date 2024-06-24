<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<h1>所持アイテム一覧</h1>
<ul>
    <ul class="nav col-18 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="accountList" class="nav-link px-2">account</a></li>
        <li><a href="userList" class="nav-link px-2  ">user</a></li>
        <li><a href="itemList" class="nav-link px-2 ">items</a></li>
        <li><a href="posItemList" class="nav-link px-2 link-secondary">posItems</a></li>
    </ul>
    <table class="table">
        <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>プレイヤー名</th>
            <th>アイテム名</th>
            <th>所持個数</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posItems as $pos)
            <tr>
                <th>{{$pos['id']}}</th>
                <th>{{$pos['pla_name']}}</th>
                <th>{{$pos['item_name']}}</th>
                <th>{{$pos['num']}}</th>
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
