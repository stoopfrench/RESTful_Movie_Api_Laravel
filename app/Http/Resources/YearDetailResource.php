<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class YearDetailResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'year' => $this->year,
            'genres' => $this->combGenres,
            'request' => [
                'type' => 'GET',
                'description' => 'get a details about this movie',
                'url' => "api/titles/{$this->id}"
            ]
        ];

    }
}
