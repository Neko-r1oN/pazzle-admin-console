<?php

    namespace App\Http\Controllers;

    use App\Models\followLog;
    use App\Models\ItemLog;
    use App\Models\mailLog;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;


    class LogController extends Controller
    {
        public function index()
        {

        }

        public function itemLogs(Request $request)
        {//
            //必要なレコードを取得
            /*$logs = ItemLog::select('item_logs.id', 'users.name as user_name', 'items.name as item_name',
                'mails.item_num as item_num', 'item_logs.created_at')
                ->join('users', 'item_logs.get_user_id', '=', 'users.id')
                ->join('mails', 'item_logs.get_item_id', '=', 'mails.id')
                ->join('items', 'mails.item_id', '=', 'items.id')
                ->get();*/
            //必要なレコードを取得
            $logs = ItemLog::all();
            return view('itemLogs/index', ['logs' => $logs]);

        }

        public function followLogs(Request $request)
        {//
            /*$logs = followLog::select('follow_logs.id', 'users.name as follow_name', 'users.name as follower_name',
                'follow_logs.action as action', 'follow_logs.created_at')
                ->join('users', 'follow_logs.follow_user_id', '=', 'users.id')
                ->get();*/

            //必要なレコードを取得
            $logs = followLog::all();
            return view('followLogs/index', ['logs' => $logs]);

        }

        public function mailLogs(Request $request)
        {//
            //必要なレコードを取得
            $logs = mailLog::all();
            return view('mailLogs/index', ['logs' => $logs]);

        }
    }
