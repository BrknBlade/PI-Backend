<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'gender'      => $this->gender,
            'description' => $this->description,
            'date'        => $this->date,
            'hour'        => $this->hour,
            'user_id'     => $this->user_id,
            'cut_type_id' => $this->cut_type_id,
            'status'      => $this->status,
            'created_at'  => $this->created_at,
        ];
    }
}
