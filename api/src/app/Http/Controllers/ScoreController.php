<?php

    namespace App\Http\Controllers;

    use App\Http\Resources\ScoreRankingResource;
    use App\Http\Resources\PosMailResource;
    use App\Http\Resources\UserFollowResource;
    use App\Http\Resources\UserItemsResource;
    use App\Http\Resources\UserResource;
    use App\Models\Follow;
    use App\Models\Mail;
    use App\Models\ScoreLog;
    use App\Models\Stage;
    use App\Models\OpenMail;
    use App\Models\PosItem;
    use App\Models\ScoreRanking;
    use App\Models\ItemLog;
    use App\Models\FollowLog;
    use App\Models\MailLog;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Validator;


    class ScoreController extends Controller
    {
        //スコアランキング一覧取得
        public function index(Request $request)
        {
            //指定された範囲内のユーザーのみを取得
            $scores = ScoreRanking::all()->sortByDesc('score')->take(100);

            return response()->json($scores, 200);
        }


        //指定ユーザー情報取得
        public function getRank(Request $request)
        {
            //指定されたuser_idのユーザー情報を取得
            $scores = ScoreRanking::all()->sortByDesc('score')->where('user_id', '=',
                $request->user_id)->first();

            return response()->json($scores, 200);
        }

        //指定ユーザー情報取得
        public function getMyScoreRank(Request $request)
        {
            //指定されたuser_idのユーザー情報を取得
            $scores = ScoreLog::all()->where('user_id', '=',
                $request->user_id)->sortByDesc('score');

            return response()->json($scores, 200);
        }


        //ランキング更新
        public function sendScore(Request $request)
        {
            //バリテーションチェック
            $validator = Validator::make(request()->all(), [
                'user_id' => ['required', 'int'],
                "user_name" => ['required', 'string'],
                "score" => ['required', 'int']
            ]);
            //リクエストボディの指定に不備があった場合
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }


            try {
                //トランザクション開始
                $data = DB::transaction(function () use ($request) {
                    //スコア状況を検索
                    $score = ScoreRanking::where('user_id', '=', $request->user_id)->first();

                    //ログ作成
                    ScoreLog::create([
                        'user_id' => $request->user_id,
                        'user_name' => $request->user_name,
                        'score' => $request->score
                    ]);

                    //スコア未登録だった場合
                    if (empty($score)) {
                        //var_dump("ユーザー存在しなかったからつくるよん");
                        //スコア情報
                        $newScore = ScoreRanking::create([
                            'user_id' => $request->user_id,
                            'user_name' => $request->user_name,
                            'score' => $request->score
                        ]);

                        return response()->json(['id' => $newScore->id]);
                    }
                    //スコアが前回より高くなかった場合
                    if ($score->score >= $request->score) {
                        var_dump("前よりスコア低かったから更新しないよん");
                        return response()->json([], 400);
                    }//高かった場合
                    else {
                        var_dump("前よりスコア高かったから更新するよん");
                        //スコア更新
                        $score->score = $request->score;
                        //var_dump($score->score);
                    }
                    //名前更新
                    $score->user_name = $request->user_name;
                    //名前更新
                    $score->save();


                    return response()->json($score);
                });
                return response()->json($data);

            }  //通信中に予期せぬエラーが発生した場合
            catch (\Exception $e) {
                return response()->json([], 500);
            }
        }
    }
