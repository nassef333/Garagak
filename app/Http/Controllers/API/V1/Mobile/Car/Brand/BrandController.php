<?php

namespace App\Http\Controllers\API\V1\Mobile\Car\Brand;

use App\Http\Controllers\API\Traits\APIResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Brand\BrandRequest;
use App\Http\Resources\API\V1\Brand\BrandResource;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    use APIResponse;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pages = $request->has('rows') ? $request->rows : 20;
        $perPage = $request->has('page') ? $pages : null;

        return $perPage ? BrandResource::collection(Brand::paginate($perPage)) : BrandResource::collection(Brand::all());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
            $data = $request->validated();

            $brand = Brand::create($data);

            return $this->success(201, "Brand Stored Successfully.", new BrandResource($brand));
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return $this->success(201, "OK.", new BrandResource($brand));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        $data = $request->validated();

        $brand->update($data);

        return $this->success(201, "Brand Updated Successfully.", new BrandResource($brand));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return $this->success(201, "Brand Deleted Successfully.", '');
    }
}
