<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreColumnRequest;
use App\Http\Requests\UpdateColumnRequest;
use App\Models\Column;
use App\Services\ColumnService;
use Illuminate\Http\JsonResponse;
use Throwable;

class ColumnController extends Controller
{
    public function __construct(
        private ColumnService $columnService
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->columnService->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreColumnRequest  $request
     *
     * @return JsonResponse
     */
    public function store(StoreColumnRequest $request): JsonResponse
    {
        return $this->columnService->store($request->validated());
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateColumnRequest  $request
     * @param  Column  $column
     *
     * @return JsonResponse
     * @throws Throwable
     */
    public function update(UpdateColumnRequest $request, Column $column): JsonResponse
    {
        return $this->columnService->update($request->validated(), $column);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Column  $column
     *
     * @return JsonResponse
     * @throws Throwable
     */
    public function destroy(Column $column): JsonResponse
    {
        return $this->columnService->destroy($column);
    }
}
