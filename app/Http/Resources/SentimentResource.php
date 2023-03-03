<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SentimentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return  [

                'id' => $this->id,
                'sentence' => $this->sentence,
                'rating' => $this->rating


        ];
    }


    public function with($request)
    {
        return [
            "success" => true,
            "message"=> "Scan info retrieved successfully."
        ];
    }
}
