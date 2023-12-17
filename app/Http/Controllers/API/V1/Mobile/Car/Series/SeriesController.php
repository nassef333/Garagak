<?php

namespace App\Http\Controllers\API\V1\Mobile\Car\Series;

use App\Http\Controllers\API\Traits\APIResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Series\SeriesRequest;
use App\Http\Resources\API\V1\Series\SeriesResource;
use App\Models\Brand;
use App\Models\CarSeries;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    use APIResponse;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pages = $request->has('rows') ? $request->rows : 20;
        $perPage = $request->has('page') ? $pages : null;

        return $perPage ? SeriesResource::collection(CarSeries::paginate($perPage)) : SeriesResource::collection(CarSeries::all());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(SeriesRequest $request)
    {
        $data = $request->validated();

        $series = CarSeries::create($data);

        return $this->success(201, "Series Stored Successfully.", new SeriesResource($series));
    }

    /**
     * Display the specified resource.
     */
    public function show(CarSeries $series)
    {
        return $this->success(201, "OK.", new SeriesResource($series));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SeriesRequest $request, CarSeries $series)
    {
        $data = $request->validated();

        $series->update($data);

        return $this->success(201, "Series Updated Successfully.", new SeriesResource($series));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarSeries $series)
    {
        $series->delete();
        return $this->success(201, "Series Deleted Successfully.", '');
    }

    //get Brand Series by id
    public function getBrandSeries($id)
    {
        $series = CarSeries::where('brand_id', $id)->get();

        return $this->success(201, "OK.", SeriesResource::collection($series));
    }
}
