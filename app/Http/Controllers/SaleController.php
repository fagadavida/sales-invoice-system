<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index(): View
    {
        $sales = DB::select("SELECT * FROM sales AS s
        INNER JOIN customers AS c ON s.customer_id = c.id");
        return view('sales.index', compact('sales'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create(): View
    {
        $customers = Customer::all();
        return view('sales.create', compact('customers'));
    }


    public function store(Request $request): RedirectResponse
    {
        $inv_no = rand(0, 99999);
        $sale = Sale::create($request->post() + ["invoice_no" => $inv_no, "status" => "Pending"]);
        if ($sale->id > 0) {
            session(['sale_id' => $sale->id]);
        }
        return redirect()->route('invoices.create')
            ->with('success', 'Record created successfully, add products.');
    }


    public function show(Sale $sale): View
    {
        return view('sales.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale): View
    {
        return view('sales.edit', compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale): RedirectResponse
    {
        $sale->update($request->post());

        return redirect()->route('sales.index')
            ->with('success', 'Sale updated successfully');
    }

    public function destroy(Sale $sale): RedirectResponse
    {
        $sale->delete();

        return redirect()->route('sales.index')
            ->with('success', 'Sales deleted successfully');
    }
}
