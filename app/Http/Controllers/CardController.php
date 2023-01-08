<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexCardRequest;
use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\UpdateCardRequest;
use App\Models\Card;
use App\Services\CardService;
use Illuminate\Http\JsonResponse;
use Throwable;

class CardController extends Controller
{
    public function __construct(private CardService $cardService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(IndexCardRequest $request): JsonResponse
    {
        return $this->cardService->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCardRequest  $request
     *
     * @return JsonResponse
     */
    public function store(StoreCardRequest $request): JsonResponse
    {
        return $this->cardService->store($request->validated());
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCardRequest  $request
     * @param  Card  $card
     *
     * @return JsonResponse
     * @throws Throwable
     */
    public function update(UpdateCardRequest $request, Card $card): JsonResponse
    {
        return $this->cardService->update($request->validated(), $card);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Card  $card
     *
     * @return JsonResponse
     * @throws Throwable
     */
    public function destroy(Card $card): JsonResponse
    {
        return $this->cardService->destroy($card);
    }
}
