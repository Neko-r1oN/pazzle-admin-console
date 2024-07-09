<?php

    namespace App\Http\Controllers;

    use App\Http\Resources\ItemResource;
    use App\Models\Item;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;

    class ItemController extends Controller
    {
        public function index(Request $request)
        {

        }

        public function showItemList()
        {
            $items = Item::all();     //レベルが50以上のプレイヤーのみを表示
            return response()->json(ItemResource::collection($items), 200);
        }

        
    }
