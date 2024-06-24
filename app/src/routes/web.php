<?php

    use App\Http\Controllers\AccountController;
    use App\Http\Controllers\AuthController;
    use Illuminate\Support\Facades\Route;

    //ログイン画面表示(デフォルト)
    Route::get('/', [AuthController::class, 'showLogin'])->name('login');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    //ユーザーアカウントリスト表示
    Route::get('accounts/index', [AccountController::class, 'index']);
    Route::get('accounts/accountList', [AccountController::class, 'accountList'])->name('accounts.index');

    //プレイヤーリスト表示
    Route::get('accounts/userList', [AccountController::class, 'userList'])->name('users.index');
    //アイテムリスト表示
    Route::get('accounts/itemList', [AccountController::class, 'itemList'])->name('items.index');
    //所持アイテムリスト表示
    Route::get('accounts/posItemList', [AccountController::class, 'posItemList'])->name('posItems.index');


    //ログイン画面
    Route::get('/', [AuthController::class, 'showLogin'])->name('login');
    //ログイン処理
    Route::post('auth/doLogin', [AuthController::class, 'doLogin']);
    //ログアウト処理
    Route::post('auth/doLogout', [AuthController::class, 'doLogout']);
