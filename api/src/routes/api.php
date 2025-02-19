<?php

    use App\Http\Controllers\ItemController;
    use App\Http\Controllers\MailController;
    use App\Http\Controllers\ScoreController;
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

    //指定ユーザー取得
    Route::middleware(NocheMiddleware::class)
        ->get('login/{user_id}', [UserController::class, 'login'])
        ->name('login');

    //アイテム一覧取得
    Route::middleware(NocheMiddleware::class)
        ->get('itemList', [ItemController::class, 'showItemList'])
        ->name('itemList');

    //ステージ一覧取得
    Route::middleware(NocheMiddleware::class)
        ->get('stageList', [UserController::class, 'stages'])
        ->name('stageList');

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

    //ユーザートークン生成
    Route::post('users/createToken', [UserController::class, 'createToken'])
        ->name('createToken');

    //ユーザー情報更新
    Route::post('users/update', [UserController::class, 'update'])
        ->middleware('auth:sanctum')
        ->name('update');

    //ユーザー所持アイテム情報更新
    Route::post('users/posItemUpdate', [UserController::class, 'posItemUpdate'])
        ->middleware('auth:sanctum')
        ->name('posItemUpdate');

    //ユーザー情報削除
    Route::post('users/destroy', [UserController::class, 'destroy'])
        ->middleware('auth:sanctum')
        ->name('destroy');

    //ユーザーフォロー情報追加
    Route::post('users/follow', [UserController::class, 'follow'])
        ->middleware('auth:sanctum')
        ->name('follow');

    //ユーザーフォロー情報削除
    Route::post('users/unfollow', [UserController::class, 'unfollow'])
        ->middleware('auth:sanctum')
        ->name('unfollow');

    //ユーザーメール情報更新
    Route::post('users/mailUpdate', [UserController::class, 'mailUpdate'])
        ->middleware('auth:sanctum')
        ->name('mailUpdate');


    //スコアランキング一覧取得
    Route::middleware(NocheMiddleware::class)
        ->get('scoreRanking', [ScoreController::class, 'index'])
        ->name('scoreRanking');

    //自身のみのランキング取得
    Route::middleware(NocheMiddleware::class)
        ->get('getRank/{user_id}', [ScoreController::class, 'getRank'])
        ->name('getRank');

    //スコア情報登録
    Route::post('users/sendScore', [ScoreController::class, 'sendScore'])
        ->middleware('auth:sanctum')->name('sendScore');
