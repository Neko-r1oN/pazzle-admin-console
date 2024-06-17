<?php

    use App\Http\Controllers\AccountController;

    use Illuminate\Support\Facades\Route;

    //ログイン画面表示(デフォルト)
    Route::get('/', [AccountController::class, 'showLogin'])->name('accounts.index');
    //ユーザーアカウントリスト表示
    Route::get('accounts/userList', [AccountController::class, 'userList'])->name('accounts.index');
    //ログイン処理
    Route::post('doLogin', [AccountController::class, 'doLogin']);
    //ログアウト処理
    Route::post('accounts/doLogout', [AccountController::class, 'doLogout']);
    //ログイン画面表示
    Route::get('login/index', [AccountController::class, 'showLogin'])->name('accounts.index');
    //プレイヤーリスト表示
    Route::get('accounts/playerList', [AccountController::class, 'playerList'])->name('players.index');
    //アイテムリスト表示
    Route::get('accounts/itemList', [AccountController::class, 'itemList'])->name('items.index');
    //所持アイテムリスト表示
    Route::get('accounts/posItemList', [AccountController::class, 'posItemList'])->name('posItems.index');
