<?php

    namespace App\Http\Resources;


    namespace App\Http\Resources;

    use Illuminate\Http\Request;
    use Illuminate\Http\Resources\Json\JsonResource;

    class ScoreRankingResource extends JsonResource
    {
        public function toArray(Request $request): array
        {
            return [
                'id' => $this->id,
                'user_id' => $this->user_id,
                'user_name' => $this->user_name,
                'score' => $this->score,
                'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $this->updated_at->format('Y-m-d H:i:s')
            ];
        }
    }
