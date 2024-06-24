<?php

    namespace App\Http\Controllers;

    use App\Models\Account;
    use Barryvdh\Debugbar\Facades\Debugbar;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;

    class AuthController extends Controller
    {
        //ログイン画面を表示
        public function showLogin(Request $request)
        {
            //ログインしてるかチェック
            if ($request->session()->exists('login')) {
                return redirect('accounts/userList');
            } else {
                return view('login.index');
            }
        }

        //ログイン処理
        public function doLogin(Request $request)
        {
            route('login');

            //バリデーションチェック
            $validated = $request->validate([
                'name' => ['required', 'min:4', 'max:20'],
                'password' => ['required'],
            ]);

            $validator = Validator::make($request->all(), [
                'name' => ['required', 'min:4'],
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect("/")
                    ->withErrors($validator)
                    ->withInput();
            }

            //レコードを取得
            $account = Account::where('name', '=', $request['name'])->get();

            //レコードを取得できた場合
            if ($account->count() > 0) {

                //ハッシュ化したキーと一致した場合
                if (Hash::check($request['password'], $account[0]->password)) {

                    //ログイン情報を保存
                    $request->session()->put('login', true);
                    return redirect('accounts/index');

                }

            }
            //キーと不一致、存在しないユーザー名だった場合
            return redirect()->route('login', ['error' => 'invalid']);
        }

        //ログアウト処理
        public function doLogout(Request $request)
        {
            //指定したデータをセッションから削除
            $request->session()->forget('login');

            //ログイン画面にリダイレクト
            return redirect('/');
        }

        //ホームページ表示
        public function showHome(Request $request)
        {
            if ($request->session()->has('login')) {
                return view('home/index');
            } else {
                return redirect('/');
            }
        }
    }
