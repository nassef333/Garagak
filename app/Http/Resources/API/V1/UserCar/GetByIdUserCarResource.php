<?php

namespace App\Http\Resources\API\V1\UserCar;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserCarResource extends JsonResource
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
            'model_name' => $this->name,
            'series_name' => $this->carSeries->name,
            'brand_name' => $this->carSeries->brand->name,
            'color' => $this->color,
            'plate' => $this->plate,
        ];
    }
}
