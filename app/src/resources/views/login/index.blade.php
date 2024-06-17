<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
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
<form class="signin h3   font-weight-normal nav col-18 col-md-auto mb-2 justify-content-center mb-md-0" method="POST"
      action="{{url('doLogin')}}">
    @csrf
    <div class="container">
        <div class="row">
            <h1 class="h3  font-weight-normal nav col-18 col-md-auto mb-2 justify-content-center mb-md-0">Please sign
                in</h1>


            <input type="text" name="name" id="inputPassword" class="form-control" placeholder="Name"
                   required="">

            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password"
                   required="">


            <label><input hidden="hidden" name="action" value="doLogin"></label>

            <button class="btn btn-lg btn-primary btn-block" type="submit" name="action">Sign in</button>
            @if(isset($error))
                <br>
                <div>{{$error}}</div>
                <br>
            @endif
        </div>
    </div>
</form>


</body>
</html>
