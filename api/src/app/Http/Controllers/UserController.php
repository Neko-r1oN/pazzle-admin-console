<?php

    namespace App\Http\Controllers;

    use App\Http\Resources\PosMailResource;
    use App\Http\Resources\UserFollowResource;
    use App\Http\Resources\UserItemsResource;
    use App\Http\Resources\UserResource;
    use App\Models\Follow;
    use App\Models\OpenMail;
    use App\Models\PosItem;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Validator;

    class UserController extends Controller
    {

        public function index(Request $request)
        {
            $validator = Validator::make(request()->all(), [
                'min_level' => ['required', 'int'],
                'max_level' => ['required', 'int'],
            ], [
                'min_level.required' => '書いてないよ',
                'min_level.int' => '数字じゃないよ',
                'max_level.required' => '書いてないよ',
                'max_level.int' => '数字じゃないよ',
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

            $user = User::findOrFail($request->user_id);
            $user->name = $request->user_name;     //カラム更新
            $user->save();

            return response()->json();
        }

        public function posItemUpdate(Request $request)
        {

            $user = PosItem::findOrFail($request->user_id);

            //テーブル内に指定したアイテムIDが記録されていなかった場合
            if (PosItem::table('pos_Items')->where('user_id', $request->user_id && 'get_item_id',
                $request->get_item_id)->exists()) {
                $user = PosItem::create([
                    'user_id' => $request->user_id,
                    'item_id' => $request->get_item_id,
                    'item_num' => $request->get_item_num,
                ]);
            }

            if (PosItem::table('pos_Items')->where('user_id', $request->user_id && 'used_item_id',
                $request->get_item_id)->exists()) {
                //テーブル内に指定したアイテムIDが記録されていなかった場合
                return response()->json();
            } else {
                $user = PosItem::findOrFail($request->user_id);

                $user->item_num -= $request->used_item_num;
            }
            $user->save();
            return response()->json();
        }

        public function destroy(Request $request)
        {

        }

        public function follow(Request $request)
        {
            $user = Follow::create([
                'send_user_id' => $request->follow_user_id,
                'follow_user_id' => $request->follower_user_id

            ]);

            return response()->json();
        }

        public function unfollow(Request $request)
        {
            //削除対象のレコードを検索して削除
            $unfollowing = Follow::where('send_user_id', Auth::id())->where('follow_user_id',
                $request->user_id)->delete();


            return response()->json();
        }

    }
