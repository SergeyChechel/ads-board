<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'lastname' => $this->lastname,
            'birthday' => $this->birthday ? $this->birthday->toDateString() : null, // Форматирование даты
            'role_id' => $this->role_id,
            'address' => $this->address,
            'phone' => $this->phone,
            'status' => $this->status,
        ];
    }
}
