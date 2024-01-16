<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\Item;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;

class ItemService
{
    public function model(): Item
    {
        return new Item();
    }

    public function paginate(?int $perPage = 15): LengthAwarePaginator
    {
        return $this->model()
            ->latest()
            ->paginate($perPage)
            ->withQueryString();
    }

    public function storeItem($request)
    {
        try {
            DB::beginTransaction();
            $item = $this->createItem($request);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

    private function createItem($request): Item
    {
        $item = Item::create([
            'item_code' => $request->item_code ?? null,
            'name' => $request->name ?? null,
            'unit_id' => 1,
        ]);
        return $item;
    }

    // public function updateUser(Request $request,User $user): User
    // {
    //     try {
    //         DB::beginTransaction();
    //         $user = $this->updateUserProfile($request, $user);
    //         DB::commit();
    //     } catch (\Exception $exception) {
    //         DB::rollBack();

    //         throw new CustomException($exception->getMessage(), $exception->getCode());
    //     }

    //     return $user;
    // }

    // private function updateUserProfile($request, User $user): User
    // {
    //     $user->update([
    //         'name' => $request->name ?? $user->name,
    //         'email' => $request->email ?? $user->email,
    //         'password' => $request->password ? Hash::make($request->password) : $user->password,
    //     ]);
    //     $role = Role::findById($request->role_id);
    //     $roleName = $role->name;
    //     $user->syncRoles($roleName);
    //     return $user;
    // }
}
