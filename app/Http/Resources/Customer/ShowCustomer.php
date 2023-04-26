<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowCustomer extends JsonResource
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
            'fullname' => $this->getFullName(),
            'email' => $this->getEmail(),
            'username' => $this->getUsername(),
            'gender' => $this->getGender(),
            'country' => $this->getCountry(),
            'city' => $this->getCity(),
            'phone' => $this->getPhoneNumber()
        ];
    }
}
