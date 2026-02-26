<?php

namespace App\Interfaces;

use App\Http\Requests\ExpenseRequest;
use App\Models\Expense;
use Illuminate\Http\Request;

interface ExpenseInterface
{
    # Fetch all expenses
    public function getExpenses();

    # Save an expense
    public function saveExpense(ExpenseRequest $request);

    # Update an expense
    public function updateExpense(ExpenseRequest $request, Expense $expense);

    # Delete an expense
    public function deleteExpense(Expense $expense);
}
