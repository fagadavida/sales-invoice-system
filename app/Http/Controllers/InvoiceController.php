<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index(): View
    {
        $invoices = DB::select("SELECT * FROM invoices AS i
        INNER JOIN products AS p ON i.product_id = p.id ");

        return view('invoices.index', compact('invoices'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function receipt(Request $request): View
    {
        $saleId = session('sale_id');
        if ($saleId == null) {
            $saleId = request()->id;
        }
        $customers = DB::select("SELECT * FROM sales AS s INNER JOIN customers AS c ON s.customer_id = c.id WHERE s.id = $saleId LIMIT 1");
        $customer = $customers[0];
        $invoices = DB::select("SELECT * FROM invoices AS i INNER JOIN products AS p ON i.product_id = p.id WHERE i.sale_id  = $saleId");
        return view('invoices.receipt', compact('customer', 'invoices'));
    }

    public function create(Request $request): View
    {
        $saleId = session('sale_id');

        if ($saleId == null) {
            $saleId = request()->id;
        }
        $customers = DB::select("SELECT * FROM sales AS s INNER JOIN customers AS c ON s.customer_id = c.id WHERE s.customer_id = $saleId LIMIT 1");
        $customer = $customers[0];
        $products = Product::all();
        $invoices = DB::select("SELECT * FROM invoices AS i INNER JOIN products AS p ON i.product_id = p.id WHERE i.sale_id  = $saleId");
        return view('invoices.create', compact('customer', 'products', 'invoices'));
    }

    public function store(Request $request): RedirectResponse
    {
        $saleId = session('sale_id');
        Invoice::create($request->post() + ['sale_id' => $saleId, "discount" => 0]);

        return redirect()->route('invoices.create')
            ->with('success', 'Invoice created successfully.');
    }

    public function show(Invoice $invoice): View
    {
        $my_invoice = DB::select("SELECT * FROM invoices AS i
        INNER JOIN products AS p ON i.product_id = p.id WHERE i.id = $invoice->id");
        $invoice = $my_invoice[0];
        return view('invoices.show', compact('invoice'));
    }


    public function edit(Invoice $invoice): View
    {
        return view('invoices.edit', compact('invoice'));
    }


    public function update(Request $request, Invoice $invoice): RedirectResponse
    {
        $invoice->update($request->validated());

        return redirect()->route('invoices.index')
            ->with('success', 'Invoice updated successfully');
    }

    public function destroy(Invoice $invoice): RedirectResponse
    {
        $invoice->delete();

        return redirect()->route('invoices.index')
            ->with('success', 'Invoice deleted successfully');
    }
}
