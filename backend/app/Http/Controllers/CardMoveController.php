<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Column;
use App\Models\Card;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CardMoveController extends Controller
{
    /**
     * Переносит карточку в другую колонку.
     */
    public function moveCard(Request $request, Column $toColumn, Card $card): JsonResponse
    {
        // Проверяем, что карточка уже принадлежит текущей колонке
        if ($card->column_id == $toColumn->id) {
            return response()->json(['message' => 'Card is already in the target column.'], 400);
        }

        // Перемещаем карточку в новую колонку
        $card->update(['column_id' => $toColumn->id]);
        return response()->json([
            'message' => 'Card moved successfully.',
        ]);
    }
}
