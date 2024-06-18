<?php

    namespace App\Http\Controllers;

    use App\Models\Account;
    use App\Models\Player;
    use App\Models\Item;
    use App\Models\PosItem;
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

            //ログインされている場合
            if ($request->session()->has('login')) {

                //アカウント検索欄が空欄だった場合
                if (empty($request->account_name)) {
                    //テーブルの全てのレコードを取得
                    $accounts = Account::All();
                    return view('accounts/index', ['accounts' => $accounts]);
                }//アカウント名の検索があった場合
                else {
                    //指定文字列でフィルタリング
                    $accounts = Account::where('name', '=', $request->account_name)->get();
                    return view('accounts/index', ['accounts' => $accounts]);
                }
            }//ログインされていない場合
            else {
                return redirect('/');
            }
        }

        public function userList(Request $request)
        {//
            //ログインしているかチェック
            if ($request->session()->exists('login')) {
                $title = "管理者アカウント一覧";

                //テーブルの全てのレコードを取得
                $accounts = Account::all();
                return view('accounts/index', ['title' => $title], ['accounts' => $accounts]);
            }//ログインされていない場合
            else {
                return view('login/index');
            }

        }

        public function playerList(Request $request)
        {//
            //ログインしているかチェック
            if ($request->session()->exists('login')) {


                //テーブルの全てのレコードを取得
                $players = Player::all();
                return view('players/index', ['players' => $players]);
            }//ログインされていない場合
            else {
                return view('login/index');
            }

        }

        public function itemList(Request $request)
        {//
            //ログインされている場合
            if ($request->session()->exists('login')) {

                //テーブルの全てのレコードを取得
                $items = Item::all();
                return view('items/index', ['items' => $items]);
            }//ログインされていない場合
            else {
                return view('login/index');
            }


        }

        public function posItemList(Request $request)
        {//
            //ログインされている場合
            if ($request->session()->exists('login')) {

                //テーブルの全てのレコードを取得
                $posItems = PosItem::all();
                return view('posItems/index', ['posItems' => $posItems]);
            }//ログインされていない場合
            else {
                return view('login/index');
            }

        }

    }
