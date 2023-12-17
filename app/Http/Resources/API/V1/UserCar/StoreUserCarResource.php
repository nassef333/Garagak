<?php

namespace App\Http\Resources\API\V1\UserCar;

use App\Models\CarModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreUserCarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $carModel = CarModel::find($this->model_id);
        return [
            'id' => $this->id,
            'model_name' => $carModel->name,
            'series_name' => $carModel->carSeries->name,
            'brand_name' => $carModel->carSeries->brand->name,
            'color' => $this->color,
            'plate' => $this->plate,
        ];
    }
}
