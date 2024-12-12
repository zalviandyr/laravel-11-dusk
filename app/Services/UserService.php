<?php

namespace App\Services;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function getLatest(): Collection
    {
        return $this->user->newQuery()->latest()->get();
    }

    public function store(RegisterRequest $request): void
    {
        $request->merge([
            'password' => Hash::make($request->password),
        ]);

        $data = $request->toArray();

        $this->user->newQuery()->create($data);
    }
}
