<?php

    namespace App\Http\Controllers;

    use App\Http\Resources\PosMailResource;
    use App\Http\Resources\UserFollowResource;
    use App\Http\Resources\UserItemsResource;
    use App\Http\Resources\UserResource;
    use App\Models\Follow;
    use App\Models\Mail;
    use App\Models\OpenMail;
    use App\Models\PosItem;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Validator;

    class UserController extends Controller
    {

        //ユーザー一覧取得
        public function index(Request $request)
        {
            $validator = Validator::make(request()->all(), [
                'min_level' => ['required', 'int'],
                'max_level' => ['required', 'int'],
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }


            $users = User::all()->where('level', '>=', $request->min_level)
                ->where('level', '<=', $request->max_level);     //レベルが50以上のプレイヤーのみを表示

            return response()->json(UserResource::collection($users), 200);
        }

        //指定ユーザー情報取得
        public function show(Request $request)
        {
            $user = User::findOrFail($request->user_id);
            $response = [
                "detail" => $user
            ];
            return response()->json(
                UserResource::make($user)
            );
        }

        //ユーザー所持アイテム取得
        public function userItems(Request $request)
        {
            $userItem = posItem::all()->whereIn('user_id', $request->user_id);
            $response = [
                "detail" => [
                    UserItemsResource::collection($userItem),
                ]
            ];
            return response()->json($response, 200);
        }

        //ユーザー所持メール取得
        public function userMails(Request $request)
        {
            $userMail = OpenMail::all()->whereIn('user_id', $request->user_id);
            $response = [

                PosMailResource::collection($userMail),

            ];
            return response()->json($response, 200);
        }

        //指定ユーザーフォロー情報取得
        public function userFollows(Request $request)
        {
            $userFollow = Follow::all()->whereIn('send_user_id', $request->user_id);
            $response = [

                UserFollowResource::collection($userFollow),

            ];
            return response()->json($response, 200);
        }

        //ユーザー新規登録
        public function store(Request $request)
        {
            $validator = Validator::make(request()->all(), [
                'name' => ['required', 'string'],
                'level' => ['required', 'int'],
                'exp' => ['required', 'int'],
                'life' => ['required', 'int'],
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $user = User::create([
                'name' => $request->name,
                'level' => 1,
                'exp' => 0,
                'life' => 1,
            ]);

            return response()->json(['user_id' => $user->id]);
        }

        //ユーザー情報更新
        public function update(Request $request)
        {
            $validator = Validator::make(request()->all(), [
                'user_id' => ['required', 'int'],
                'user_name' => ['required', 'string'],
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $user = User::findOrFail($request->user_id);
            $user->name = $request->user_name;     //カラム更新
            $user->save();

            return response()->json();
        }

        //所持アイテム更新
        public function posItemUpdate(Request $request)
        {
            $validator = Validator::make(request()->all(), [
                'user_id' => ['required', 'int'],
                'change_item_id' => ['required', 'int'],
                'change_item_num' => ['required', 'int'],
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            //所持アイテム状況を検索
            $posItem = PosItem::where('user_id', '=', $request->user_id)
                ->where('item_id', $request->change_item_id)->first();


            //指定ユーザーが該当アイテムを所持していなかった・アイテム変動値が正数だった場合
            if (empty($posItem) && $request->change_item_num > 0) {
                $posItem = PosItem::create([
                    'user_id' => $request->user_id,
                    'item_id' => $request->change_item_id,
                    'item_num' => $request->change_item_num,
                ]);
                return response()->json(['id' => $posItem->id]);
            }//該当アイテムを所持していなかったが、アイテム変動値が負数だった場合
            elseif (empty($posItem) && $request->change_item_id <= 0) {

                return response()->json([], 400);
                /*abort(400);*/
            }
            //アイテムの合計値が０以上だった場合
            if ($posItem->item_num + $request->change_item_num >= 0) {
                $posItem->item_num += $request->change_item_num;
            }//アイテムの合計値が０以下だった場合
            else {
                $posItem->item_num = 0;
            }
            $posItem->save();
            return response()->json();
        }

        public function destroy(Request $request)
        {

        }

        //ユーザーフォロー更新処理
        public function follow(Request $request)
        {
            $validator = Validator::make(request()->all(), [
                'follow_user_id' => ['required', 'int'],
                'follower_user_id' => ['required', 'int'],
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            //フォロー状況を検索
            $isFollow = Follow::where('send_user_id', '=', $request->follow_user_id)
                ->where('follow_user_id', '=', $request->follower_user_id)->first();
            //すでにフォローしていた場合
            if (!empty($isFollow)) {
                abort(400);
            }


            $follow = Follow::create([
                'send_user_id' => $request->follow_user_id,
                'follow_user_id' => $request->follower_user_id

            ]);

            return response()->json(['id' => $follow->id]);
        }

        public function unfollow(Request $request)
        {
            $validator = Validator::make(request()->all(), [
                'unfollow_user_id' => ['required', 'int'],
                'follower_user_id' => ['required', 'int'],
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            //削除対象のレコードを検索して削除
            $unfollow = Follow::where('send_user_id', '=', $request->unfollow_user_id)
                ->where('follow_user_id', '=', $request->follower_user_id)->delete();

            return response()->json();
        }

        public function mailUpdate(Request $request)
        {
            $validator = Validator::make(request()->all(), [
                'user_id' => ['required', 'int'],
                'mail_id' => ['required', 'int'],
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            //メール開封状況を検索
            $mail = OpenMail::where('user_id', '=', $request->user_id)
                ->where('mail_id', '=', $request->mail_id)->first();

            //指定していたメールIDが存在していなかった・受け取られていた場合
            if (empty($mail) || $mail->isOpen !== 1) {
                abort(400);
            }

            //指定ユーザー送付メール情報を取得
            $userMail = Mail::where('id', '=', $request->mail_id)->get()->first();

            //指定ユーザー所持アイテム情報を取得
            $posItem = PosItem::where('user_id', '=', $request->user_id)
                ->where('item_id', '=', $userMail->item_id)->get();

            //所持アイテム更新
            //テーブル内に指定したアイテムIDが記録されていなかった場合
            if (count($posItem) <= 0) {

                $userGetItem = PosItem::create([
                    'user_id' => $request->user_id,
                    'item_id' => $userMail->item_id,
                    'item_num' => $userMail->item_num,
                ]);
            } //すでに所持していた場合
            else {
                //所持分と追加分のアイテムの合計値が０以上だったら
                if ($userMail->first()->item_num + $posItem->first()->item_num >= 0) {
                    $posItem->first()->item_num += $userMail->first()->item_num;    //加算
                }//アイテムの合計値が０以下だった場合
                else {
                    $posItem->first()->item_num = 0;
                }
                $posItem->first()->save();
            }
            //開封済みにする
            $mail->isOpen = 0;
            $mail->save();
            return response()->json();
        }
    }
