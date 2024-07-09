<?php

    namespace App\Http\Resources;

    use Illuminate\Http\Request;
    use Illuminate\Http\Resources\Json\JsonResource;

    class ItemResource extends JsonResource
    {
        public function toArray(Request $request)
        {
            return [
                'id' => $this->id,
                'name' => $this->name,
                'type' => $this->type,
                'effect' => $this->effect,
                'text' => $this->text,
                'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            ];
        }
    }
