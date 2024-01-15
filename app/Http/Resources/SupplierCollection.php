<?php

namespace App\Http\Resources;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SupplierCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request)
    {
        return $this->collection->transform(function (Supplier $supplier) {
            return [
                'id'      => $supplier->id,
                'name' => $supplier->name,
                'description'    => $supplier->description,
            ];
        });
    }
}
