<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Services\UnitService;
use Inertia\Inertia;
use App\Http\Resources\UnitCollection;

class UnitController extends Controller
{
    public function __construct(private UnitService $service)
    {
    }
    public function index(Request $request)
    {
        $units  = $this->service->paginate((int)$request->per_page ?? 15);
        return Inertia::render('Dashboard/Unit/Index', [
            'units'    => new UnitCollection($units),
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
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        //
    }
}
