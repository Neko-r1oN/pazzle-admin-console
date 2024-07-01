@extends('layouts')
@section('title','アカウント更新画面')
@section('body')
    <div class="container">
        <header
            class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">

                <h1>パスワード更新</h1>

                <ul class="nav col-18 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="accounts" class="nav-link px-2">account</a></li>
                    <li><a href="users" class="nav-link px-2 ">user</a></li>
                    <li><a href="items" class="nav-link px-2 ">items</a></li>
                    <li><a href="posItems" class="nav-link px-2  link-secondary">posItems</a></li>
                    <li><a href="mails" class="nav-link px-2">mails</a></li>
                </ul>


            </ul>
        </header>
    </div>

    <form class="form-signin" method="POST" action="{{route('accounts.update',['id' => $account['id']])}}">
        @csrf

        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        <label for="inputEmail" class="sr-only">アカウント名</label>
        <input type="text" id="inputEmail" name="name" class="form-control" value="{{$account['name']}}" disabled>
        <label for="inputPassword" class="sr-only">パスワード</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="パスワード" required>

        <div class="checkbox mb-3">
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="register_btn" type="submit">更新</button>

    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
@endsection
