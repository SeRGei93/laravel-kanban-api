<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCardRequest;
use App\Models\Card;
use App\Models\Column;
use Illuminate\Http\RedirectResponse;

class ColumnCardCreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreCardRequest $request, Column $column): \Illuminate\Http\JsonResponse
    {
        $column->addCard(Card::create($request->all()));
        return response()->json(['message' => 'success']);
    }
}
