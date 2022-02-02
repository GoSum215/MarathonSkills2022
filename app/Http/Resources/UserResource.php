<?php

namespace App\Http\Resources;

use App\Models\Runner;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request) : array
    {
//        $runner = RunnerResource::collection($this->runners);
//        if($runner === null) {
//            $runner = "Null";
//        }

        return [
            'login' => $this->login,
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
//            'runners' => $runner,
        ];
    }
}
