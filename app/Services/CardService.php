<?php

namespace App\Services;

use App\Models\Card;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CardService
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        $query = $this->filterByStatus(Card::class);
        $query = $this->filterByDate($query);

        return response()->json($query->get());
    }


    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    private function filterByStatus($class): Builder
    {
        //Return trashed if status 0, active if status 1, both if status not provided.
        if ( ! request()->filled('status')) {
            return $class::withTrashed();
        } else {
            if (request()->get('status')) {
                return $class::withoutTrashed();
            }

            return $class::onlyTrashed();
        }
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    private function filterByDate(Builder $query): Builder
    {
        if (request()->filled('date')) {
            return $query->whereDay('created_at' ,Carbon::create(request()->get('date')));
        }

        return $query;
    }


    public function store($validatedData): \Illuminate\Http\JsonResponse
    {
        $card = Card::create($validatedData);

        return response()->json($card, 201);
    }

    /**
     * @throws \Throwable
     */
    public function update($validatedData, Card $card): \Illuminate\Http\JsonResponse
    {
        $card->updateOrFail($validatedData);

        return response()->json($card->fresh());
    }

    /**
     * @throws \Throwable
     */
    public function destroy(Card $card): \Illuminate\Http\JsonResponse
    {
        $card->deleteOrFail();

        return response()->json(status: 204);
    }
}
