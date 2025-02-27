<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Column;
use App\Http\Requests\StoreColumnRequest;


class BoardColumnCreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreColumnRequest $request, Board $board): \Illuminate\Http\JsonResponse
    {
        $board->addColumn(Column::create($request->all()));
        return response()->json(['message' => 'success']);
    }
}
