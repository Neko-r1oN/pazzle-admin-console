<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Send Mail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row">
        <h1 class="h3  font-weight-normal nav col-18 col-md-auto mb-2 justify-content-center mb-md-0">メール送信
        </h1>

        <form method="post" action="{{route('sent')}}">
            @csrf
            <input class="form-control" type="text" name="user_id" id="user_id" placeholder="送信するユーザーID"><br>
            <input class="form-control" type="text" name="mail_id" id="mail_id" placeholder="送信するメールID"><br>
            <label for="button">
                <button type="submit" class="btn btn-outline-primary me-2">送信する</button>
            </label>
        </form>

        <div class="col-md-3 text-end">
            <form method="get" action="{{route('accounts.index')}}">
                @csrf
                <button type="submit" class="btn btn-outline-primary me-2">もどる</button>
            </form>

        </div>

    </div>
</div>

</body>
</html>
