<?php

namespace App\Services;

use App\Models\Column;

class ColumnService
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Column::all());
    }

    public function store($validatedData): \Illuminate\Http\JsonResponse
    {
        $column = Column::create($validatedData);

        return response()->json($column, 201);
    }

    /**
     * @throws \Throwable
     */
    public function update($validatedData, Column $column): \Illuminate\Http\JsonResponse
    {
        $column->updateOrFail($validatedData);

        return response()->json($column->fresh());
    }

    /**
     * @throws \Throwable
     */
    public function destroy(Column $column): \Illuminate\Http\JsonResponse
    {
        $column->deleteOrFail();

        return response()->json(status:204);
    }
}
