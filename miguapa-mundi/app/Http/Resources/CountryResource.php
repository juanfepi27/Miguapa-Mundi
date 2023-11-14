<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'nick_name' => $this->getNickName(),
            'owner' => $this->getUserOwner()->getUsername(),
            'minimum_offer_value' => $this->getMinimumOfferValueFormatted(),
            'attractive_value' => $this->getAttractiveValue(),
            'best_actual_offer_value' => $this->getMaxOfferFormatted(),
        ];
    }
}
