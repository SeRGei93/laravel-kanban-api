<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCardRequest;
use App\Models\Card;
use App\Models\Column;
use Illuminate\Http\RedirectResponse;

class ColumnCardDestroyController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Column $column, Card $card): \Illuminate\Http\JsonResponse
    {
        $card->delete();
        return response()->json(['message' => 'success']);
    }
}
