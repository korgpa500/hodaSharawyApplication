<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SuggestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'Name' => $this->sender_name,
            'Email' => $this->sender_email,
            'Message' => $this->sender_message,
            'Section' => $this->section->section_name,
            'created_at' => $this->created_at,
        ];
    }
}
