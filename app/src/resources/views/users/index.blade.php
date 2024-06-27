<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<h1>ユーザー一覧</h1>
<ul>
    <ul class="nav col-18 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="accounts" class="nav-link px-2">account</a></li>
        <li><a href="users" class="nav-link px-2  link-secondary">user</a></li>
        <li><a href="items" class="nav-link px-2 ">items</a></li>
        <li><a href="posItems" class="nav-link px-2">posItems</a></li>
        <li><a href="mails" class="nav-link px-2">mails</a></li>
    </ul>
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


</body>
</html>
