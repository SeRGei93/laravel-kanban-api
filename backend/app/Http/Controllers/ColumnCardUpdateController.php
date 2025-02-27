<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCardRequest;
use App\Models\Card;
use App\Models\Column;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class ColumnCardUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateCardRequest $request, Column $column, Card $card): JsonResponse
    {
        $card->update($request->all());
        return response()->json(['message' => 'success']);
    }
}
