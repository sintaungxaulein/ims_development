<?php

namespace App\Http\Resources;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ItemCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request)
    {
        return $this->collection->transform(function (Item $item) {
            return [
                'id'      => $item->id,
                'item_code' => $item->item_code,
                'name'    => $item->name,
                'unit'   => $item->unit->name,
            ];
        });
    }
}
