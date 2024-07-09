<?php

    namespace App\Http\Resources;

    use Illuminate\Http\Request;
    use Illuminate\Http\Resources\Json\JsonResource;

    class MailResource extends JsonResource
    {
        public function toArray(Request $request)
        {
            return [
                'id' => $this->id,
                'title' => $this->title,
                'message' => $this->message,
                'item_id' => $this->item_id,
                'item_num' => $this->item_num,
                'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            ];
        }
    }
