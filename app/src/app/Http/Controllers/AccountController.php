<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class AccountController extends Controller
    {
        public function index(Request $request)
        {

            //dd($request->account_id);

            //セッションにしていのキーで値を保存
            //$request->session()->put('キー名', 1);
            //セッションから指定のキーの値を取得
            //$value = $request->session()->get('キー名');
            //Debugbar::info($value);
            //指定したデータをセッションから削除
            //$request->session()->forget('キー名');
            //$value = $request->session()->get('キー名');
            //Debugbar::info($value);
            //セッションの全てのデータを削除
            //$request->session()->flush();
            //セッションに指定したキーが存在するか
            //if ($request->session()->exists('キー名')) {
            //}

        }

        // ログイン画面を表示する
        public function showLogin(Request $request)
        {
            //ログインしてるかチェック
            if ($request->session()->exists('login')) {
                return redirect('accounts/userList');
            } else {
                return view('login/index');
            }
        }

        // ログイン処理
        public function doLogin(Request $request)
        {
            if ($request['name'] === 'jobi' && $request['password'] === 'jobi') {

                $request->session()->put('login', true);

                //一覧表示
                return redirect('accounts/userList');

            } else {
                //エラー表示
                $error = '入力内容に誤りがあります。';
                return view('login/index', ['error' => $error]);
            }
        }

        // ログアウト処理
        public function doLogout(Request $request)
        {
            // 指定したデータをセッションから削除
            $request->session()->forget('login');

            // ログイン画面にリダイレクト
            return redirect('login/index');
        }

        public function userList(Request $request)
        {//
            //ログインしているかチェック
            if ($request->session()->exists('login')) {
                $title = "管理者アカウント一覧";

                $data = [
                    [
                        'id' => 1,
                        'name' => 'jobi',
                        'password' => 'jobi',
                    ],
                    [
                        'id' => 2,
                        'name' => 'test',
                        'password' => 'test',
                    ]
                ];

                return view('accounts/index', ['title' => $title], ['accounts' => $data]);
            }//ログインされていない場合
            else {
                return view('login/index');
            }

        }

        public function playerList(Request $request)
        {//
            //ログインしているかチェック
            if ($request->session()->exists('login')) {
                $title = "プレイヤー一覧";

                $players = [
                    [
                        'id' => 1,
                        'name' => 'r1oN',
                        'level' => 29,
                        'exp' => 290,
                        'life' => 1000,
                    ],
                    [
                        'id' => 2,
                        'name' => 'SyuEn',
                        'level' => 44,
                        'exp' => 777,
                        'life' => 4649,
                    ],
                    [
                        'id' => 3,
                        'name' => 'GOD',
                        'level' => 999,
                        'exp' => 9999,
                        'life' => 99999,
                    ],
                ];

                return view('players/index', ['title' => $title], ['players' => $players]);
            }//ログインされていない場合
            else {
                return view('login/index');
            }

        }

        public function itemList(Request $request)
        {//
            //ログインされている場合
            if ($request->session()->exists('login')) {
                $title = "アイテム一覧";

                $items = [
                    [
                        'id' => 1,
                        'name' => '毒チワワ',
                        'type' => '消耗品',
                        'effect' => 20,
                        'text' => '使うとタヒ',
                    ],
                    [
                        'id' => 2,
                        'name' => '氷炭',
                        'type' => '消耗品',
                        'effect' => 30,
                        'text' => 'ランダムに凍結効果',
                    ],
                    [
                        'id' => 3,
                        'name' => '鋭利なフジツボ',
                        'type' => '消耗品',
                        'effect' => 60,
                        'text' => 'まきびしに使える',
                    ],
                ];
                return view('items/index', ['title' => $title], ['items' => $items]);
            }//ログインされていない場合
            else {
                return view('login/index');
            }


        }

        public function posItemList(Request $request)
        {//
            //ログインされている場合
            if ($request->session()->exists('login')) {
                $title = "所持アイテム状況一覧";

                $posItems = [
                    [
                        'id' => 1,
                        'pla_name' => 'r1oN',
                        'item_name' => '毒チワワ',
                        'num' => 20,
                    ],
                    [
                        'id' => 2,
                        'pla_name' => 'SyuEn',
                        'item_name' => '氷炭',
                        'num' => 50,
                    ],
                    [
                        'id' => 1,
                        'pla_name' => 'GOD',
                        'item_name' => '鋭利なフジツボ',
                        'num' => 999,
                    ],
                ];
                return view('posItems/index', ['title' => $title], ['posItems' => $posItems]);
            }//ログインされていない場合
            else {
                return view('login/index');
            }

        }

    }
