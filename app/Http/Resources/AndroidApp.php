<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AndroidApp extends JsonResource
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
            'name' => $this->name,
            'version' => $this->version,
            'description' => $this->description,
            'price' => $this->price,
            'package_name' => $this->package_name,
            'private' => !!$this->private,
            'approved' => !!$this->approved,
            'creator_id' => $this->creator_id,
            'pivot' => $this->when(
                isset($this->pivot),
                function () {
                    return $this->pivot;
                }
            ),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
