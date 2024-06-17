<?php
    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use http\Env\Request;

    //use Illuminate\Http\Request;
 class LoginController  extends Controller
 {

     //ログイン関数
     public function index(Request $request)
     {
         $userModel = new User();
         $login = new Login();
         $users = $userModel->getUsers();
         //$errors = $login->validation($post);
         $loginFlag = false;                 //ログイン判定

         //var_dump($users);
         //exit();
         //ユーザー認証
         foreach ($users as $user) {
             //if ($post['name'] === $user['name'] && password_verify($post['password'], $user['password'])) {

                 //session_start();
                 var_dump("セッション完了");
                 $_SESSION = ['login' => 'ok'];     //セッションデータ登録
                 $loginFlag = true;                 //認証承認
             //}
         }
         //ログイン認証されていたら
         if ($loginFlag === true) {
             //echo '成功';

             header('Location: ./index.php?action=home');
         } //ログイン認証されていなかったら
         elseif ($loginFlag === false) {

             require_once 'App/Views/viewLogin.php';
         }
     }
 }
