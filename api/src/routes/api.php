<?php

    use App\Http\Controllers\ItemController;
    use App\Http\Controllers\MailController;
    use App\Http\Controllers\UserController;
    use App\Http\Middleware\NocheMiddleware;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;

    //指定ユーザー取得
    Route::middleware(NocheMiddleware::class)
        ->get('users/{user_id}', [UserController::class, 'show'])
        ->name('users.show');
    //ユーザー一覧取得
    Route::middleware(NocheMiddleware::class)
        ->get('users', [UserController::class, 'index'])
        ->name('users');

    //アイテム一覧取得
    Route::middleware(NocheMiddleware::class)
        ->get('itemList', [ItemController::class, 'showItemList'])
        ->name('itemList');
    //指定ユーザー所持アイテム一覧取得
    Route::middleware(NocheMiddleware::class)
        ->get('userItems/{user_id}', [UserController::class, 'userItems'])
        ->name('users.item');

    //マスターメール一覧取得
    Route::middleware(NocheMiddleware::class)
        ->get('mailList', [MailController::class, 'showMailList'])
        ->name('mailList');
    //指定ユーザー所持メール一覧取得
    Route::middleware(NocheMiddleware::class)
        ->get('userMails/{user_id}', [UserController::class, 'userMails'])
        ->name('users.userMails');

    //指定ユーザーフォロー情報取得
    Route::middleware(NocheMiddleware::class)
        ->get('userFollows/{user_id}', [UserController::class, 'userFollows'])
        ->name('users.userFollows');

    //ユーザー登録
    Route::post('users/store', [UserController::class, 'store'])
        ->name('store');

    //ユーザー情報更新
    Route::post('users/update', [UserController::class, 'update'])
        ->name('update');

    //ユーザー情報更新
    Route::post('users/posItemUpdate', [UserController::class, 'posItemUpdate'])
        ->name('posItemUpdate');

    //ユーザー情報削除
    Route::post('users/destroy', [UserController::class, 'destroy'])
        ->name('destroy');

    //ユーザーフォロー情報追加
    Route::post('users/follow', [UserController::class, 'follow'])
        ->name('follow');
    //ユーザーフォロー情報削除
    Route::post('users/unfollow', [UserController::class, 'unfollow'])
        ->name('unfollow');

    //ユーザーフォロー情報削除
    Route::post('users/mailUpdate', [UserController::class, 'mailUpdate'])
        ->name('mailUpdate');
