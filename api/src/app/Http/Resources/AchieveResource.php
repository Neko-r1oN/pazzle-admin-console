<?php

    namespace App\Http\Resources;

    use Illuminate\Http\Request;
    use Illuminate\Http\Resources\Json\JsonResource;

    class AchieveResource extends JsonResource
    {
        public function toArray(Request $request)
        {
            return [
                'id' => $this->id,
                'title' => $this->title,
                'message' => $this->message,
                'exp' => $this->exp,
                'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            ];
        }
    }
