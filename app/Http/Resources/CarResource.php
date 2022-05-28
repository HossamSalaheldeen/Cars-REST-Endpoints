<?php

namespace App\Http\Resources;

use App\Enums\CarGasEconomyStatus;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'color' => $this->color,
            'year' => $this->year,
            'top_speed' => $this->top_speed,
            'has_gas_economy' => CarGasEconomyStatus::getGasEconomyStringType($this->has_gas_economy),
            'model' => CarModelResource::make($this->carModel),
        ];
    }
}
