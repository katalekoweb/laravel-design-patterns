<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseRequest;
use App\Interfaces\ExpenseInterface;
use App\Models\Expense;
use App\Services\ExpenseService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class ExpenseController extends Controller
{
    function __construct(public ExpenseService $expenseService) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): InertiaResponse
    {
        $expenses = $this->expenseService->getExpenses();
        return Inertia::render('Expenses/Index', compact("expenses"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Expenses/Form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpenseRequest $request)
    {
        $expense = $this->expenseService->saveExpense($request);

        if ($expense) return redirect()->route('expenses.index')->with('success', 'Gasto registrado exitosamente');
        return redirect()->route('expenses.index')->with('error', 'O registo de um gasto falhou');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        return Inertia::render('Expenses/Form', compact("expense"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        return Inertia::render('Expenses/Form', compact("expense"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExpenseRequest $request, Expense $expense)
    {
        $expense = $this->expenseService->updateExpense($request, $expense);
        if ($expense) return redirect()->route('expenses.index')->with('success', 'Gasto atualizado exitosamente');
        return redirect()->route('expenses.index')->with('error', 'A atualização de um gasto falhou');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $deleted = $this->expenseService->deleteExpense($expense);
        if ($deleted) return redirect()->route('expenses.index')->with('success', 'Gasto deletado exitosamente');
        return redirect()->route('expenses.index')->with('error', 'A exclusão de um gasto falhou');
    }
}
