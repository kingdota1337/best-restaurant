<?php

namespace App\Http\Resources\Users;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserEditResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'first_name' => $this->first_name,
            'surname' => $this->surname,
            'role_id' => $this->roles->first()->id,
            'email' => $this->email
        ];
    }
}
