<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseRequest;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $expenses = Expense::latest()->get();
        return response()->json($expenses, Response::HTTP_OK);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpenseRequest $request): JsonResponse
    {
        $expense = Expense::create($request->validated());
        return response()->json($expense, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense): JsonResponse
    {
        return response()->json($expense, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExpenseRequest $request, Expense $expense): JsonResponse
    {
        $expense->update($request->validated());
        return response()->json($expense, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense): JsonResponse
    {
        $expense->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
