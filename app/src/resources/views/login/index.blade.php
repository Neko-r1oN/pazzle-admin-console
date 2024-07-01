@extends('layouts')
@section('title','ログイン画面')
@section('body')
    <?php
        //
        //ログインページ表示
        //2024/07/01 川口京佑
        //
    ?>

    <form class=" h3   font-weight-normal nav col-18 col-md-auto mb-2 justify-content-center mb-md-0" method="POST"
          action="{{url('auth/doLogin')}}">
        @csrf
        <div class="container">
            <div class="row">
                <h1 class="h3  font-weight-normal nav col-18 col-md-auto mb-2 justify-content-center mb-md-0">Please
                    sign
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

        @if($errors -> any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

    </form>
@endsection
