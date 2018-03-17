<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class YearResource extends JsonResource
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
            'year' => $this->year,
            'count' => $this->count,
            'request' => [
                'type' => 'GET',
                'description' => 'get a list of movies from this year',
                'url' => "api/year/{$this->year}"
            ]
        ];
    }
}
