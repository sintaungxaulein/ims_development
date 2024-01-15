<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Services\SupplierService;
use Inertia\Inertia;
use App\Http\Resources\SupplierCollection;

class SupplierController extends Controller
{
    public function __construct(private SupplierService $service)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $suppliers  = $this->service->paginate((int)$request->per_page ?? 15);
        return Inertia::render('Dashboard/Supplier/Index', [
            'suppliers'    => new SupplierCollection($suppliers),
            'params'   => $request->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
