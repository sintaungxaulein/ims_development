<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Services\ItemService;
use Inertia\Inertia;
use App\Http\Resources\ItemCollection;

class ItemController extends Controller
{

    public function __construct(private ItemService $service)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $items  = $this->service->paginate((int)$request->per_page ?? 15);
        return Inertia::render('Dashboard/Item/Index', [
            'items'    => new ItemCollection($items),
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
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
