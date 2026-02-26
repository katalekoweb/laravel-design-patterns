<?php

namespace App\Repositories;

use App\Http\Requests\ExpenseRequest;
use App\Interfaces\ExpenseInterface;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ExpenseRepository implements ExpenseInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Function: getExpenses
     * Description: This function will get all expenses
     */
    public function getExpenses (): Collection {
        return Expense::all();
    }

    /**
     * Function: saveExpense
     * Description: This function will save an expense
     */
    public function saveExpense(ExpenseRequest $request): Expense {
        try {
            return DB::transaction(function () use ($request) {
                return Expense::query()->create($request->validated());
            });
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Function: updateExpense
     * Description: This function will update an expense
     */
    public function updateExpense(ExpenseRequest $request, Expense $expense): Expense {
        try {
            return DB::transaction(function () use ($request, $expense) {
                $expense->update($request->validated());
                return $expense;
            });
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Function: deleteExpense
     * Description: This function will delete an expense
     */
    public function deleteExpense(Expense $expense): bool {
        try {
            return DB::transaction(function () use ($expense) {
                return $expense->delete();
            });
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
