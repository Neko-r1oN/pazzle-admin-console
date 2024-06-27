<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Account List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<html lang="ja">
<?php
    //
    //ログインページ表示
    //2024/05/28 川口京佑
    //
?>

<html lang="ja">
<form class="create h3   font-weight-normal nav col-18 col-md-auto mb-2 justify-content-center mb-md-0" method="POST"
      action="{{url('accounts/store')}}">
    @csrf
    <div class="container">
        <div class="row">
            <h1 class="h3  font-weight-normal nav col-18 col-md-auto mb-2 justify-content-center mb-md-0">
                アカウント登録</h1>


            <input type="text" name="name" id="name" class="form-control" placeholder="ユーザー名" required="">

            <input type="password" name="password" id="password" class="form-control" placeholder="パスワード"
                   required="">
            <input type="password" name="password2" id="password2" class="form-control" placeholder="パスワード(確認用)"
                   required="">


            <label><input hidden="hidden" name="action" value="store"></label>

            <button class="btn btn-lg btn-primary btn-block" type="submit" name="action">登録</button>


            @if(isset($error))
                <br>
                <div>{{$error}}</div>
                <br>
            @endif
        </div>
    </div>

    @if($errors -> any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

</form>


</body>
</html>
