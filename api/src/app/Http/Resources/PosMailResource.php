<?php

    namespace App\Http\Resources;

    use Illuminate\Http\Request;
    use Illuminate\Http\Resources\Json\JsonResource;

    class PosMailResource extends JsonResource
    {
        public function toArray(Request $request): array
        {
            return [
                'id' => $this->id,
                'user_id' => $this->user_id,
                'mail_id' => $this->mail_id,
                'isOpen' => $this->isOpen,
                'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            ];
        }
    }
