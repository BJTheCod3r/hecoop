<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;


class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'email' => $this->email,
            'name' => $this->name,
            'role' => User::ROLES_READABLE[$this->role],
            'created_at' => $this->created_at->format('m/d/Y h:i A'),
            'updated_at' => $this->updated_at->format('m/d/Y h:i A')
        ];
    }
}
