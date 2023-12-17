<?php

namespace App\Http\Controllers\API\V1\Mobile\Car\UserCars;

use App\Http\Controllers\API\Traits\APIResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\UserCar\UserCarRequest;
use App\Http\Resources\API\V1\UserCar\GetByIdUserCarResource;
use App\Http\Resources\API\V1\UserCar\StoreUserCarResource;
use App\Http\Resources\API\V1\UserCar\UserCarResource;
use App\Models\CarModel;
use App\Models\CarUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCarsController extends Controller
{
    use APIResponse;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Auth::user()->carModels;
        return $this->success(201, "OK.", new UserCarResource($cars[0]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCarRequest $request)
    {
        $data = $request->validated();

        $userCar = CarUser::create($data);

        return $this->success(201, "Model Stored Successfully.", new StoreUserCarResource($userCar));
    }

    /**
     * Display the specified resource.
     */
    public function show($model_id)
    {
        $carUser = CarUser::where('user_id', Auth::user()->id)->where('model_id', $model_id)->first();

        return  $carUser? $this->success(201, "Ok.", new GetByIdUserCarResource($carUser)) : $this->error(404, 'Car Not found!!', '');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarUser $carUser)
    {
        $brand->delete();
        return $this->success(201, "Brand Deleted Successfully.", '');
    }
}
