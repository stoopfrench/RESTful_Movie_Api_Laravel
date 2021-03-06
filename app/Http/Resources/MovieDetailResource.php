<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'title' => $this->title,
            'year' => $this->year,
            'genres' => $this->combGenres,
            'created' => $this->created,
            'request' => [
                'type' => 'GET',
                'description' => 'Get a list of all movies',
                'url' => '/api/titles'
            ]
        ];
    }
}
