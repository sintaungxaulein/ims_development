<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\Supplier;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;

class SupplierService
{
    public function model(): Supplier
    {
        return new Supplier();
    }

    public function paginate(?int $perPage = 15): LengthAwarePaginator
    {
        return $this->model()
            ->latest()
            ->paginate($perPage)
            ->withQueryString();
    }

    // public function storeUser($request)
    // {
    //     try {
    //         DB::beginTransaction();
    //         $user = $this->createUser($request);
    //         DB::commit();
    //     } catch (\Exception $exception) {
    //         DB::rollBack();
    //     }
    // }

    // private function createUser($request): User
    // {
    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email ?? null,
    //         'password' => Hash::make($request->password),
    //     ]);
    //     $role = Role::findById($request->role_id);
    //     $roleName = $role->name;
    //     $user->assignRole($roleName);
    //     return $user;
    // }

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
