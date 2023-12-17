<?php

namespace App\Http\Controllers\API\V1\Mobile\Car\Model;

use App\Http\Controllers\API\Traits\APIResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Model\ModelRequest;
use App\Http\Resources\API\V1\Model\ModelResource;
use App\Models\CarModel;
use App\Models\CarSeries;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    use APIResponse;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pages = $request->has('rows') ? $request->rows : 20;
        $perPage = $request->has('page') ? $pages : null;

        return $perPage ? ModelResource::collection(CarModel::paginate($perPage)) : ModelResource::collection(CarModel::all());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ModelRequest $request)
    {
        $data = $request->validated();

        $model = CarModel::create($data);

        return $this->success(201, "Model Stored Successfully.", new ModelResource($model));
    }

    /**
     * Display the specified resource.
     */
    public function show(CarModel $model)
    {
        return $this->success(201, "OK.", new ModelResource($model));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ModelRequest $request, CarModel $model)
    {
        $data = $request->validated();

        $model->update($data);

        return $this->success(201, "Model Updated Successfully.", new ModelResource($model));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarModel $model)
    {
        $model->delete();
        return $this->success(201, "Model Deleted Successfully.", '');
    }

    //get Brand Series by id
    public function getSeriesModels($id)
    {
        $model = CarModel::where('car_series_id', $id)->get();

        return $this->success(201, "OK.", ModelResource::collection($model));
    }
}
