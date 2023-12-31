<?php

namespace App\Http\Resources\API\V1\UserCar;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class GetByIdUserCarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'model_id' => $this->id,
            'user_id' => Auth::user()->id,
            'color' => $this->color,
            'plate' => $this->plate,
        ];
    }
}
