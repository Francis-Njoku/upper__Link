<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;

class Post extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'author' => $this->author,
            'title' => $this->title,
            'post' => $this->post,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
    /**
     * Customize the outgoing response for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Response  $response
     * @return void
     *
    public function withResponse($request, $response)
    {
        $response->header('X-Value', 'True');
    } */
}
