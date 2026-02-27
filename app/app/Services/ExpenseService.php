<?php

namespace App\Services;

use App\Interfaces\ExpenseInterface;
use App\Models\Expense;
use Illuminate\Support\Collection;

class ExpenseService
{
    public function __construct(public ExpenseInterface $expenseInterface) {}

    public function getExpenses() : Collection
    {
        return $this->expenseInterface->getExpenses();
    }

    public function saveExpense($request) : Expense
    {
        // here we put the business logic
        return $this->expenseInterface->saveExpense($request);
    }

    public function updateExpense($request, $expense) : Expense
    {
        return $this->expenseInterface->updateExpense($request, $expense);
    }

    public function deleteExpense($expense) : bool
    {
        return $this->expenseInterface->deleteExpense($expense);
    }
}
