<?php

    namespace App\Http\Resources;

    use Illuminate\Http\Request;
    use Illuminate\Http\Resources\Json\JsonResource;

    class UserFollowResource extends JsonResource
    {
        public function toArray(Request $request): array
        {

            return [
                'send_user_id' => $this->send_user_id,
                'follow_user_id' => $this->follow_user_id,
                'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $this->updated_at->format('Y-m-d H:i:s')
            ];
        
        }
    }
