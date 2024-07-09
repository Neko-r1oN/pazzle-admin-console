<?php

    namespace App\Http\Resources;

    use Illuminate\Http\Request;
    use Illuminate\Http\Resources\Json\JsonResource;

    class UserItemsResource extends JsonResource
    {
        public function toArray(Request $request): array
        {
            return [

                "user_id" => $this->user_id,
                "item_id" => $this->item_id,
                "item_num" => $this->item_num,
            ];


        }
    }
