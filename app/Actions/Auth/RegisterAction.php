<?php

namespace App\Actions\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterAction
{
    public function execute(RegisterRequest $request): array
    {
        $validated = $request->validated();
        $user = User::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'name' => $validated['name'],
            'device_name' => $validated['device_name'],
        ]);

        return [
            'user' => $user,
            'token' => $user->createToken($validated['device_name'])->plainTextToken
        ];
    }
}
